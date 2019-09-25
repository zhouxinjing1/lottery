<?php


Route::group('v', function () {
    // 修改头像
    Route::get('user/updateUserPicture', 'api/account/modifyPicture');

    // 修改个人资料
    Route::post('user/updateUserInfo', 'api/account/modifyInformation');

    // 获取个人资料
    Route::get('user/queryUserDetailInfo', 'api/account/getInformation');

})->middleware(['CheckSign', 'CheckToken']);