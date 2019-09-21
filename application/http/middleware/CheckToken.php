<?php

namespace app\http\middleware;

use app\api\tool\Token;

/**
 * token 校验
 * Class CheckToken
 * @package app\http\middleware
 */
class CheckToken
{
    public function handle($request, \Closure $next)
    {
        $token = isset($_SERVER['HTTP_TOKEN']) ?: $request->param('token');
        if (is_null($token)) {
            return response(json_encode(custom_response(-1,'token不存在')));
        }

        $decoded = Token::verification($token);
        if ($token === false) {
            return response(json_encode(custom_response(-1,'token有误')));
        }

        if (time() >= $decoded['exp']) {
            return response(json_encode(custom_response(-1,'token已过期')));
        }

        $request->accountId = $decoded['data']->accountId;

        return $next($request);
    }

}