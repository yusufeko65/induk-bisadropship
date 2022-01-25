<?php

Route::get('banks', [
    'as' => 'admin.banks.edit',
    'uses' => 'BankController@edit',
    'middleware' => 'can:admin.banks.edit',
]);

Route::put('banks', [
    'as' => 'admin.banks.update',
    'uses' => 'SettingController@update',
    'middleware' => 'can:admin.banks.edit',
]);
