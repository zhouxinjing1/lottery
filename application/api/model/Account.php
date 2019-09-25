<?php

namespace app\api\model;

use think\Model;
use app\api\tool\Rsa;

/** 账号表
 * Class Account
 * @package app\api\model
 */
class Account extends Model
{
    // 插入数据自动完成
    protected $insert = ['created_at'];

    // 隐藏数据
    protected $hidden = ['id', 'password'];

    protected $table = 'account';


    // 观察者
    protected static function init()
    {
        self::observe(\app\api\event\Account::class);
    }

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


    /**
     * 验证用户名是否存在
     * @param $name
     * @return mixed
     */
    public function isExistUserName($name)
    {
        return $this->whereUsername($name)->find();
    }
}