<?php

Route::group('v',function (){


    Route::get('/user/initRegister','api/tools/initRegister');
    Route::get('/user/existLoginName','api/login/isLoginName');


})->middleware('CheckSign');



