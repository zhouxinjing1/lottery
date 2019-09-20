<?php

namespace app\http\middleware;

use think\Exception;

class CheckSign
{


    public function handle($request, \Closure $next)
    {

        $params = $request->param();
        if (!$this->_checkSign($params)) {

            return response(json_encode(['code'=>80001,'message'=>'参数无效'],JSON_UNESCAPED_UNICODE));

        };

        return $next($request);

    }


    public function _checkSign($params = null)
    {


        try {

            $apiSecret = config('other.apiSecret');
            $ifySign = md5("apiSecret" . $apiSecret . "platformType" . $params['platformType'] . "siteCode" . $params['siteCode'] . 'siteId' . $params['siteId'] . 'timesamp' . $params['timesamp']);

            return $ifySign != strtolower($params['sign']) ? false : true;

        } catch (Exception $e) {
            return false;

        };

    }


}
