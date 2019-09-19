<?php

Route::group('login', function () {
    // 获取验证码
    Route::get('getCodeImage', 'api/login/getCodeImage');

    // 注册
    Route::post('register', 'api/login/register');



});
