# A Laravel 5 integration for GoCardless    [![Latest Stable Version](https://poser.pugx.org/midnite81/gocardless/version)](https://packagist.org/packages/midnite81/gocardless) [![Total Downloads](https://poser.pugx.org/midnite81/gocardless/downloads)](https://packagist.org/packages/midnite81/gocardless) [![Latest Unstable Version](https://poser.pugx.org/midnite81/gocardless/v/unstable)](https://packagist.org/packages/midnite81/gocardless) [![License](https://poser.pugx.org/midnite81/gocardless/license.svg)](https://packagist.org/packages/midnite81/gocardless) [![Build](https://travis-ci.org/midnite81/gocardless.svg?branch=master)](https://travis-ci.org/midnite81/gocardless) [![Coverage Status](https://coveralls.io/repos/github/midnite81/gocardless/badge.svg?branch=master)](https://coveralls.io/github/midnite81/gocardless?branch=master)

This package is a laravel 5 wrapper for the [GoCardless API](https://github.com/gocardless/gocardless-pro-php).
This package is in **PreRelease** and currently relies on dev-master. When ready for release, it will 
be tagged correctly.  

# Installation

This package requires PHP 5.6+, and comes with a Laravel 5 Service Provider and Facade for Laravel integration. 
Please note, you do not need to have laravel installed to use this package. 

To install through composer include the package in your `composer.json`.

    "midnite81/gocardless": "dev-master"

Run `composer install` or `composer update` to download the dependencies or you can 
run `composer require midnite81/gocardless`.

## Laravel 5 Integration

To use the package with Laravel 5 add the GoCardless Service Provider to the list of Service Providers 
in `app/config/app.php`.

    'providers' => [
        ...
        Midnite81\GoCardless\GoCardlessServiceProvider::class
        ...
    ];
    
Add the `GoCardless` facade to your aliases array.

    'aliases' => [

      'GoCardless' => Midnite81\GoCardless\Facades\GoCardless::class,
      
    ];
    
## Publish the required files
    
Publish the config and migration files using 
`php artisan vendor:publish --provider="Midnite81\GoCardless\GoCardlessServiceProvider"`

## Environmental Variables

Once you have published the files, you will need to update your `.env` to include the following env keys.

```
GOCARDLESS_ENVIRONMENT=<live|sandbox>
GOCARDLESS_API_KEY_PRODUCTION=<your production api key>
GOCARDLESS_API_KEY_SANDBOX=<your sandbox api key>
GOCARDLESS_PUBLISH_MIGRATIONS=<true|false>
```

## Check the config

You should take a look at the `config/gocardless.php` configuration file as there are a number of settings you should be 
aware of. For example, you can prefix migrations with a custom prefix of your own. Please update these if necessary.  

## Accessing the GoCardless Client

To access GoCardless you can either use the Facade or the GoCardless Client instance is bound to the IOC container and you can 
then dependency inject it via its contract.

    GoCardless::getClient();
    
    public function __construct(Midnite81\GoCardless\Contracts\Services\Client $client)
    {
        $this->client = $client;
    }
    