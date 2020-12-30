<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        //
    ];
//    protected $addHttpCookie = true;
//
//    protected $except = [
//        'auth/facebook/callback',
//        'auth/google/callback',
//    ];
}
