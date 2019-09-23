<?php

namespace app\api\tool;

use \Firebase\JWT\JWT;

class Token
{
    private static $key = '12!a@aas2df&&12-3123';

    private static $expire = 60 * 60 * 24;

    /**
     * 创建token
     * @param $id 用户id
     * @return string
     */
    public static function createToken($id)
    {
        $time = time(); //当前时间
        $token = [
            'iat' => $time, //签发时间
            'nbf' => $time , //(Not Before)：某个时间点后才能访问，比如设置time+30，表示当前时间30秒后才能使用
            'exp' => $time + self::$expire, //过期时间,这里设置2个小时
            'data' => [         //自定义信息，不要定义敏感信息
                'accountId' => $id,
            ]
        ];
        return JWT::encode($token, self::$key); //输出Tok
    }


    /**
     * 解码token
     * @param $token
     * @return array|bool
     */
    public static function verification($token)
    {
        try {
//            JWT::$leeway = 60; //当前时间减去60，把时间留点余地
            $decoded = JWT::decode($token, self::$key, ['HS256']);
            return (array)$decoded;
        }catch(\UnexpectedValueException $e) {  //其他错误
            return false;
        }

    }

}