<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 自定义返回格式
 * @param int $code
 * @param array $data
 * @param string $message
 * @return array
 */
function custom_response($code = 0, $message = '成功', $data = [])
{
    return array(
        'code' => $code,
        'message' => $message,
        'data' => $data,
    );
}

/**
 * 剔除公钥启始符
 * @param $key
 * @return bool|string
 */
function splitPublicKey($key)
{

    $starLen = strlen("-----BEGIN PUBLIC KEY-----\n");
    $key = substr($key, $starLen, strlen($key));

    $endLen = strlen("\n-----END PUBLIC KEY-----\n");
    $key = substr($key, 0, strlen($key)-$endLen);

    return $key;
}