<?php

namespace app\api\model;

use think\Model;

/** 账号信息表
 * Class Account
 * @package app\api\model
 */
class AccountInformation extends Model
{
    protected $table = 'account_information';

    // 隐藏输出
    protected $hidden = ['id', 'a_id'];


    /**
     * 关联账号主表
     */
    public function account()
    {
        return $this->belongsTo('Account','a_id');
    }
}