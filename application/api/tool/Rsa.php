<?php
namespace app\api\tool;

use think\facade\Log;

class Rsa
{
    private $config = array(
         "private_key_bits" => 1024,
         "private_key_type" => OPENSSL_KEYTYPE_RSA,
    );

    private $res = null;

    public $privKey = null;

    public $pubKey = null;

    public $error = 0;

    public function __construct($config_path)
    {
        $this->config['config'] = $config_path;

        if (!$this->res = openssl_pkey_new($this->config)) {
            Log::error('SSH配置错误');

            return $this->error = 1;
        }

        openssl_pkey_export($this->res, $this->privKey ,null ,$this->config);

        $this->pubKey = openssl_pkey_get_details($this->res)["key"];
    }


    /**
     * 获取公钥
     * @return |null
     */
    public function get_pubKey()
    {
        return $this->pubKey;
    }

    /**
     * 获取私钥
     * @return null
     */
    public function get_privKey()
    {
        return $this->privKey;
    }


    /**
     * 私钥解密
     * @param $input 加密值
     * @param $privKey 加密key
     * @return int
     */
    public function private_decrypt($input, $privKey)
    {
        if (!openssl_pkey_get_private($privKey)) {
            Log::error('私钥PrivKey错误');

            return NULL;
        }

        openssl_private_decrypt(base64_decode($input), $decrypted, $privKey);

        return $decrypted;
    }

}