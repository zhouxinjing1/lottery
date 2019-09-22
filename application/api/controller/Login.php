<?php

namespace app\api\controller;

use app\api\tool\Token;
use think\facade\Cache;
use think\facade\Env;
use think\facade\Log;
use think\Request;
use think\captcha\Captcha;
use app\api\validate\Account as AccountValidate;
use app\api\model\Account as AccountModel;
use app\api\tool\Rsa;
use app\api\model\System;
use app\api\tool\RuleAll;

/**
 * 登录 注册类
 * Class Login
 * @package app\api\controller
 */
class Login
{

    /**
     * 注册
     * @param Request $request
     * @param AccountModel $account
     * @return array
     */
    public function saveUser(Request $request, AccountModel $account)
    {
        $data = $request->param();

        // 密码校验
        $privKey = System::getStaticValue('privKey');
        if (Rsa::private_decrypt($data['password2'], $privKey) !== Rsa::private_decrypt($data['password'], $privKey))
            return custom_response(-1, '两次密码不一致');

        if ($account->isExistUserName($request->param('userName')) !== null)
            return custom_response(-1, '用户名已存在');


        // 下面上级代理验证操作(忽略)


        if (!$account->allowField(true)->save($data)) {
            Log::error('注册用户失败');

            return custom_response(500, '服务器故障');
        }


        return custom_response(1000, '操作成功', Token::createToken($account->id));
    }


    /**
     * 登录
     * @param Request $request
     * @param AccountModel $account
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function userLogin(Request $request, AccountModel $account)
    {
        $data = $request->param();
        $ErrorTimes = (int)cache($data['userName']);

        if ($ErrorTimes >= 1 && $ErrorTimes < 6) { //判断是否存在试错级别


            // 验证码校验
            if (cache($data['verId']) === false) {

                return custom_response(10134, '验证码失效,请刷新验证码');

            }

            if (!captcha_check($data['verifyCode'], $data['verId'])) {
                return custom_response(40102, '验证码有误', [
                    'ErrorTimes' => $ErrorTimes
                ]);
            }

        } elseif ($ErrorTimes >= 6) { //试错级别顶级 冻结账号处理


            return custom_response(10134, '账号已被冻结');

        }


        // 密码校验
        $password = Rsa::private_decrypt($data['password'], System::getStaticValue('privKey'));
        $accountData = $account->where(array('userName' => $data['userName'], 'password' => $password))->find();

        if (is_null($accountData)) {
            Cache::inc($data['userName'], 1); //增加试错次数
            $ErrorTimes = cache($data['userName']);
            return custom_response(0, '账号或密码错误,当前错误次数' . $ErrorTimes . '次,若达到6次将被冻结', [
                'ErrorTimes' => $ErrorTimes
            ]);
        }

        Cache::set($data['userName'], 0); // 登录成功初始化试错
        return custom_response(1000, '成功', array('token' => Token::createToken($accountData['id'])));
    }


    /**
     * 获取验证码
     * @param Request $request
     * @return \think\Response
     */
    public function verifyCode(Request $request)
    {
        $captcha = new Captcha();

        $captcha->codeSet = '0123456789';
        $captcha->length = 4;
        $captcha->expire = 360;

        //增加配置!用于验证是否过期
        cache($request->param('verId'), 0, 360);

        return $captcha->entry($request->param('verId'));
    }


    /**
     * 获取公钥
     * @param System $system
     * @return array
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function getPublicKey(System $system)
    {
        $pubKey = $system->getKeyValue('pubKey');

        if (!openssl_pkey_get_public($pubKey)) {
            $rsa = new Rsa(Env::get('openssl_path'));
            if ($rsa->error) {
                return ['key' => 1, 'message' => 'openssh配置有误'];
            }

            $system->setKeyValue('pubKey', $rsa->get_pubKey());
            $system->setKeyValue('privKey', $rsa->get_privKey());
        }

        return [
            'key' => 0,
            'message' => '获取公钥成功',
            'response' => splitPublicKey($system->getKeyValue('pubKey'))
        ];

    }


    /**
     * 注册验证合集
     * @param RuleAll $ruleAll
     * @return \think\response\Json
     */
    public function initRegister(RuleAll $ruleAll)
    {
        return $ruleAll->initRegister();
    }


    /**
     * 验证用户名是否存在
     * @param Request $request
     * @param AccountModel $account
     * @return array
     */
    public function isLoginName(Request $request, AccountModel $account)
    {
        $bool = $account->isExistUserName($request->param('loginName'));

        if (is_null($bool)) {
            $res = ['code' => 10000, 'message' => '成功'];
        } else {
            $res = ['code' => 80001, 'message' => '用户名已存在'];
        }

        return $res;
    }

}
