<?php

// 中间件 CheckSign InsertHead CheckToken
Route::group('v', function () {
    // 注册验证合集
    Route::get('/user/initRegister','api/login/initRegister');

    // 用户名是否可用
    Route::get('/user/existLoginName','api/login/isLoginName');

    // 获取公钥
    Route::get('user/getPublicKey', 'api/login/getPublicKey');

    // 获取验证码
    Route::get('user/verifyCode', 'api/login/verifyCode');

    // 注册
    Route::post('user/saveUser', 'api/login/saveUser');

    // 登录
    Route::post('user/userLogin', 'api/login/userLogin');

})->middleware(['CheckSign']);

