<?php

namespace app\http\middleware;

use think\Exception;

class CheckSign
{


    public function handle($request, \Closure $next)
    {

        $params = $request->param();

        unset($params['/'.$request->path()]); //过滤掉路由地址参数

        if (!$this->_checkSign($params)) {

            return response(json_encode(['code' => 80001, 'message' => '参数无效'], JSON_UNESCAPED_UNICODE));

        };

        return $next($request);

    }


    /**
     * @param null $params
     * @return bool
     *  sign动态验证方法
     */

    public function _checkSign($params = null)
    {


        try {

            $apiSecret = config('other.apiSecret');

            $s = $params;
            $m = "apiSecret$apiSecret";
            unset($s['sign']);
            ksort($s);

            foreach ($s as $key => $item) {
                $m = $m . $key . $item;
            }

            $ifySign = md5($m);
            return $ifySign != strtolower($params['sign']) ? false : true;

        } catch (Exception $e) {

            return false;

        };

    }


}
