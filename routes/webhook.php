<?php
$config = [
    'namespace' => 'Midnite81\GoCardless\Http\Controllers',
    'prefix' => config('gocardless.route_prefix', 'gocardless'),
];

if (! empty(config('gocardless.middleware'))) {
    $config['middleware'] = config('gocardless.middleware', 'web');
}

Route::group($config, function($router) {
    $router->post('/webhook', 'WebHookController@handle')->name('midnite81.gocardless.webhook');
});