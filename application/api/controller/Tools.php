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

        return json_decode(config('other.regular'));

    }







}