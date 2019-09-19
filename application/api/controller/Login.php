<?php
namespace app\api\controller;

use think\Request;
use think\captcha\Captcha;
use app\api\validate\Account as AccountValidate;
use app\api\model\Account as AccountModel;

class Login
{

    public function register(Request $request, AccountModel $account)
    {
        $data = $request->param();
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

        var_dump($account->id);die;

    }

    /**
     * 获取验证码
     * @param Request $request
     * @return \think\Response
     */
    public function getCodeImage(Request $request)
    {
        $captcha = new Captcha();

        $captcha->codeSet = '0123456789';
        $captcha->length = 4;

        return $captcha->entry($request->param('uuid'));

    }

}
