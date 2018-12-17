<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id'     => '568728386625677',
        'client_secret' => '1863d927e026eadc0e47b85d828d2a99',
        'redirect'      => 'http://www.everlike.com.tw/cutestore/facebook/login',
    ],

    'google' => [
        'client_id'     => '368733522274-hc77od6g3ju581j2tg4jmetsqoqhs35i.apps.googleusercontent.com',
        'client_secret' => 'G-Wc_0E-xPgUNpmkMfpVXkxk',
        'redirect'      => 'http://www.everlike.com.tw/cutestore/google/login',
    ],
];
