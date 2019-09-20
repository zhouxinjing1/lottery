<?php
namespace app\api\tool;

class Rsa
{
    //openssl_get_cipher_methods()

    // 配置
    private $config = array(
//         "digest_alg" => "sha512",
//         "private_key_bits" => 512,                    //字节数  512 1024 2048  4096 等
//         "private_key_type" => OPENSSL_KEYTYPE_RSA,    //加密类型
    );


    // 句柄
    private $res = null;

    // 私钥
    public $privKey = null;

    // 公钥
    public $pubKey = null;

    // 错误
    public $error = 0;

    public function __construct($config_path)
    {
        $this->config['config'] = $config_path;

        if (!$this->res = openssl_pkey_new($this->config)) {
            return $this->error = 1;
        }

        openssl_pkey_export($this->res, $this->privKey ,null ,$this->config);

        $this->pubKey = openssl_pkey_get_details($this->res)["key"];
    }


    /**
     * 获取公钥
     * @return |null
     */
    public function getPubKey()
    {
        return $this->pubKey;
    }


    /**
     * 公钥加密
     * @param string $data
     * @return string
     */
    public function public_encrypt($data = '')
    {
        openssl_public_encrypt($data, $encrypted, $this->pubKey);

        return base64_encode($encrypted);
    }

    /**
     * 私钥解密
     * @param string $data
     * @return bool|string
     */
    public function private_decrypt($data = '')
    {
        $decrypted = base64_decode($data);
        openssl_private_decrypt($data, $decrypted, $this->privKey);

        return $decrypted;
    }


}