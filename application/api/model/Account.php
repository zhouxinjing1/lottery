<?php

namespace app\api\model;

use think\Model;
use app\api\tool\Rsa;
use app\api\model\System;


/** 账号表
 * Class Account
 * @package app\api\model
 */
class Account extends Model
{
    protected $insert = ['created_at'];

    protected $table = 'account';

    /**
     * 密码
     * @param $value
     * @return string
     */
    public function setPasswordAttr($value)
    {
        return Rsa::private_decrypt($value, System::getStaticValue('privKey'));
    }

    /**
     * 注册时间
     * @return false|string
     */
    public function setCreatedAtAttr()
    {
        return date('Y-m-d H:i:s', time());
    }
}