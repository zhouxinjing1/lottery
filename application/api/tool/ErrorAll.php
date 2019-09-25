<?php
namespace app\api\tool;

use Exception;
use think\exception\Handle;
use think\facade\Log;

class ErrorAll extends Handle
{
    /**
     * 统一异常返回
     * @param Exception $e
     * @return \think\Response|void
     */
    public function render(Exception $e)
    {
//        return json(array('code' => -1000, 'message' => '服务器异常'));

        // 其他错误交给系统处理
        return parent::render($e);
    }

}