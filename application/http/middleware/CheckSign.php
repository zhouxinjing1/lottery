<?php

namespace app\http\middleware;

use think\Exception;

class CheckSign
{


    public function handle($request, \Closure $next)
    {

        $params = $request->param();

        if (!$this->_checkSign($params)) {
            return redirect('/api/tools/msgError', '', 302);
        };

        return $next($request);

    }


    public function _checkSign($params = null)
    {


        try {

            $apiSecret = config('tools.apiSecret');
            $ifySign = md5("apiSecret" . $apiSecret . "platformType" . $params['platformType'] . "siteCode" . $params['siteCode'] . 'siteId' . $params['siteId'] . 'timesamp' . $params['timesamp']);
            return $ifySign != strtolower($params['sign']) ? false : true;

        } catch (Exception $e) {

            return false;

        };


    }


}
