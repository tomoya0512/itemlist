<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'user',
        'passwords' => 'users',
    ],
    'guards' => [
        'user' => [
            'driver' => 'session', //認証方法
            'provider' => 'users', //providersの利用するもの
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        'admins' => [
            'driver' => 'eloquent',             //認証へのアクセス方法
            'model' => App\Admin::class, //参照するテーブル
        ],
    ],
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',  //参照するテーブル
            'expire' => 60,                //パスワードリセットの制限時間(分)
        ],
    ],

];
