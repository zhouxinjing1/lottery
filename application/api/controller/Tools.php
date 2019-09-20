<?php

namespace app\api\controller;


use think\Request;


class Tools
{

    /**
     *  获取验证规则合集
     */
    public function initRegister()
    {

        return config('tools.regular');

    }


    /**
     *
     *  错误拦截
     */
    public function msgError(Request $request)
    {

        return ['code' => 80001, 'message' => '无效参数'];

    }


}