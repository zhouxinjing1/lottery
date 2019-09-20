<?php

Route::group('v', function () {
    // 获取验证码
    Route::get('user/verifyCode', 'api/login/verifyCode');

    // 获取公钥
    Route::get('user/getPublicKey', 'api/login/getPublicKey');

    // 注册
    Route::get('register', 'api/login/register');





})->middleware(['InsertHead']);
