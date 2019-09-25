<?php


Route::group('v', function () {
    // 修改头像
    Route::get('user/updateUserPicture', 'api/account/modifyPicture');

    // 修改个人资料
    Route::post('user/updateUserInfo', 'api/account/modifyInformation');

})->middleware(['CheckSign', 'CheckToken']);