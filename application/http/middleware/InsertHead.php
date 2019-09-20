<?php


namespace app\http\middleware;

/**
 * 允许跨域请求
 * Class InsertHead
 * @package app\http\middleware
 */
class InsertHead
{
    public function handle($request, \Closure $next)
    {
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Headers:*');
        header('Access-Control-Allow-Methods:*');
        header('Content-type:application/json');

        return $next($request);
    }
}