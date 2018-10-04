<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Environment
    |--------------------------------------------------------------------------
    |  Specify whether you wish to run sandbox or production
    |
    */
    'environment' => env('GOCARDLESS_ENVIRONMENT', 'production'),

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

    /*
    |--------------------------------------------------------------------------
    | Publish Migrations
    |--------------------------------------------------------------------------
    | Whether to publish or load migrations with this package
    |
    */
    'publish_migrations' => env('GOCARDLESS_PUBLISH_MIGRATIONS', false),

    /*
    |--------------------------------------------------------------------------
    | Table Prefixes
    |--------------------------------------------------------------------------
    | You can prefix the migrations that come with this package, but once the
    | migrations have run, please do not change this setting as the models are
    | also set up to reference this setting.
    |
    */
    'table_prefix' => '',

        /*
        |--------------------------------------------------------------------------
        | Route Prefix
        |--------------------------------------------------------------------------
        | GoCardless provide an incoming webhook,
        |
        |
        */
        'route_prefix' => ''
];