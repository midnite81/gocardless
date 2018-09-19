<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Environment
    |--------------------------------------------------------------------------
    |  Specify whether you wish to run sandbox or production
    |
    */
    'environment' => env('GOCARDLSS_ENVIRONMENT', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Define the environment variables
    |--------------------------------------------------------------------------
    | Here you should specify the particular environmental variables.
    |
    */
    'environments' => [
        'production' => [
            'api_key' => env('GOCARDLESS_API_KEY_PRODUCTION', ''),
            'environment' => \GoCardlessPro\Environment::LIVE,
        ],
        'sandbox' => [
            'api_key' => env('GOCARDLESS_API_KEY_SANDBOX', ''),
            'environment' => \GoCardlessPro\Environment::SANDBOX,
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | API Limits
    |--------------------------------------------------------------------------
    | This is the max number of requests to the API that can be made per minute.
    |
    */
    'requests_per_minute' => '1000',

];