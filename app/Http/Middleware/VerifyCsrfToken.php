<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'https://www.cocogen.com/get-quote/motor-insurance/postbacksave',
        'https://www.cocogen.com/get-quote/motor-insurance/postback',
        'https://www.cocogen.com/api/ctrl/insert/set',
        'https://www.cocogen.com/api/ctrl/report/data',
        'https://www.cocogen.com/api/online/payment/report/daily',
        'https://www.cocogen.com/api/epartnerhub/user/insert',
        'https://www.cocogen.com/api/epartnerhub/user/check'

    ];
}
