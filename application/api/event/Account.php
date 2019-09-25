<?php
namespace app\api\event;

use app\api\model\AccountInformation as AccountInfo;

class Account
{
    /**
     * 新增之后事件
     * @param $account
     */
    public function afterInsert($account)
    {
        // 新增账号信息表
        $accountInfo = new AccountInfo();
        $accountInfo->a_id = $account->id;
        $accountInfo->mobile = request()->param('mobile');
        $accountInfo->save();



    }
}