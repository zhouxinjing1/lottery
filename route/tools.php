<?php

Route::group('v',function (){


    Route::get('user/initRegister','api/tools/initRegister');


})->middleware('CheckSign');



