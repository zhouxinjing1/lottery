<?php

namespace app\api\controller;

use think\Request;
use think\captcha\Captcha;
use app\api\validate\Account as AccountValidate;
use app\api\model\Account as AccountModel;
use app\api\tool\Rsa;
use app\api\model\System;

class Login
{

    public function register(Request $request, AccountModel $account)
    {
        $data = $request->param();



            var_dump($request->path());die;
        echo '<pre>';
        var_dump($data);die;
//
//        $validate = new AccountValidate;
//        if (!$validate->check($data)) {
//            return custom_response(0, $validate->getError());
//        }
//
//        if(!captcha_check($request->param('code'), $data['uuid'])){
//            return custom_response(0, '验证码有误');
//        }


        $account->allowField(true)->save($data);

        var_dump($account->id);
        die;

    }

    /**
     * 获取登录验证码图片
     * @param Request $request
     * @return \think\Response
     */
    public function verifyCode(Request $request)
    {
        $captcha = new Captcha();

        $captcha->codeSet = '0123456789';
        $captcha->length = 4;

        return $captcha->entry($request->param('verId'));

    }


    /**
     * 获取公钥
     * @param System $system
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function getPublicKey(System $system)
    {
        $pubKey = $system->getKeyValue('pubKey');

        if (!openssl_pkey_get_public($pubKey)) {
            $rsa = new Rsa(config('other.openssl_path'));
            if ($rsa->error) {
                return json(array('key' => 1, 'message' => 'openssh配置有误'));
            }

            $system->setKeyValue('pubKey', $rsa->getPubKey());
            $system->setKeyValue('privKey', $rsa->getPrivKey());
        }

        return json(array(
            'key' => 0,
            'message' => '获取公钥成功',
            'response' => $system->getKeyValue('pubKey')
        ));
    }


    /**
     *
     *  验证用户名是否存在
     */

    public function isLoginName(Request $request, AccountModel $account)
    {

        $loginName = $request->param('loginName');
        $data = $account->where(['username' => $loginName])->find();

        if (is_null($data)) {

            $res = ['code' => 10000, 'message' => '成功'];

        } else {

            $res = ['code' => 80001, 'message' => '用户名已存在'];

        }

        return $res;
    }

}
