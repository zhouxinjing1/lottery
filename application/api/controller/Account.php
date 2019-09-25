<?php

namespace app\api\controller;

use think\Controller;
use app\api\model\AccountInformation as AccountInfo;
use think\Request;

class Account extends Controller
{
    /**
     * 修改头像
     * @param Request $request
     * @param AccountInfo $accountInfo
     * @return array
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function modifyPicture(Request $request, AccountInfo $accountInfo)
    {
        $accountInfo->where('a_id', $request->accountId)->update([
            'pictureUrl' => $request->param('pictureUrl')
        ]);

        return custom_response();
    }

    /**
     * 修改个人资料
     * @param Request $request
     * @param AccountInfo $accountInfo
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function modifyInformation(Request $request, AccountInfo $accountInfo)
    {
        $param = $request->param();

        $accountInfo = $accountInfo->where('a_id', $request->accountId)->findOrFail();
        $accountInfo->nickName = $param['nickName'];
        $accountInfo->birthday = $param['birthday'];
        $accountInfo->qq = $param['qq'];
        $accountInfo->mobile = $param['mobile'];
        $accountInfo->email = $param['email'];
        $accountInfo->weChat = $param['weChat'];
        $accountInfo->save();

        return custom_response();
    }

    /**
     * 获取个人资料
     * @param Request $request
     * @param AccountInfo $accountInfo
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getInformation(Request $request, AccountInfo $accountInfo)
    {
        $data = $accountInfo->where('a_id', $request->accountId)->with('account')->findOrFail();

        return custom_response(1000,'操作成功', manyToOneArray($data));
    }
}