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
 * @param int $status
 * @param array $data
 * @param string $message
 * @return \think\response\Json
 */
function custom_response($status = 1, $message = '成功', $data = []) {
    $response = array(
        'status' => $status,
        'message' => $message,
        'data' => $data,
    );

    return json($response);
}