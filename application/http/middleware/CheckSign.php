<?php

namespace app\http\middleware;

use think\Exception;

class CheckSign
{


    public function handle($request, \Closure $next)
    {

        $params = $request->param();

        var_dump($request->path());exit();

        if (!$this->_checkSign($params)) {

            return response(json_encode(['code' => 80001, 'message' => '参数无效'], JSON_UNESCAPED_UNICODE));

        };

        return $next($request);

    }


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

            var_dump($ifySign);


            return $ifySign != strtolower($params['sign']) ? false : true;

        } catch (Exception $e) {
            return false;

        };

    }


}
