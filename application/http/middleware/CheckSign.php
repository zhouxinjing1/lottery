<?php

namespace app\http\middleware;

use think\Exception;

class CheckSign
{


    public function handle($request, \Closure $next)
    {
        $params = $request->param();
        unset($params['/' . $request->path()]);   //过滤掉路由地址参数

        if (!$this->_checkSign($params)) {
            return response(json_encode(['code' => 80001, 'message' => '参数无效'], JSON_UNESCAPED_UNICODE));
        };

        return $next($request);
    }


    /**
     * sign 校验
     * @param null $params
     * @return bool
     */
    public function _checkSign($params = null)
    {
        try {

            //过滤需要被组合的参数
            $s = $params;
            unset($s['sign']);

            //排序键值对
            ksort($s);

            //组合加密sign
            $apiSecret = config('other.apiSecret');
            $m = "apiSecret$apiSecret";
            foreach ($s as $key => $item) {
                $m = $m . $key . $item;
            }

            //MD5比较sign
            $ifySign = md5($m);
            return $ifySign != strtolower($params['sign']) ? false : true;

        } catch (Exception $e) {
            return false;
        }
    }
}
