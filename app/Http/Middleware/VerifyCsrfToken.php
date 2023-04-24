<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [

        'confirmation-payu',
    ];
}
/* 'stripe/*',
        'http://example.com/foo/bar',
        'http://example.com/foo/*' */
