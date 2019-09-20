<?php
namespace app\api\controller;

use think\Request;
use think\captcha\Captcha;
use app\api\validate\Account as AccountValidate;
use app\api\model\Account as AccountModel;
use app\api\tool\Asymmetric;

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
     *  获取公共公钥
     */
    public function getPublicKey()
    {

        $asymmetric = new Asymmetric(config('other.openssl_path'));


//        //2.加密解密数据 要加密的数据
        $data = 'plaintext data goes here';


//        //对$data进行加密 要加密的数据字符串 得到加密后的数据 加密所需要的公钥
        openssl_public_encrypt($data, $encrypted, $asymmetric->pubKey);
//        echo base64_encode($encrypted);

//        var_dump($encrypted);die;

//对加密后的数据进行解密 解密的数据 得到解密后的数据 解密所需要的私钥
//        $decrypted = base64_decode($encrypted);
        openssl_private_decrypt($encrypted, $decrypted, $asymmetric->privKey);
        echo $decrypted;  die;



//        echo $asymmetric->public_encrypt($data);


        //对加密后的数据进行解密 解密的数据 得到解密后的数据 解密所需要的私钥



//        if ($asymmetric->error) {
//            return json(array(
//               'key' => 1,
//               'message' => '获取公钥失败'
//            ));
//        }
//
//        return json(array(
//           'key' => 0,
//           'message' => "获取公钥成功",
//           'response' => $asymmetric->pubKey
//        ));
    }

}
