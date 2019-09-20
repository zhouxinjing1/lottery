<?php

namespace app\api\model;

use think\Model;


/** 账号表
 * Class Account
 * @package app\api\model
 */
class Account extends Model
{
    protected $salt = 'asd!@340..12ccc';

    protected $insert = ['created_at'];

    protected $table = 'account';

    /**
     * 密码
     * @param $value
     * @return string
     */
    public function setPasswordAttr($value)
    {
        return md5(md5($value. $this->salt));
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