<?php
namespace Midnite81\GoCardless\Facades;

use Illuminate\Support\Facades\Facade;
use Midnite81\GoCardless\Contracts\Services\Client;

/**
 * @method Client getClient()
 * @method Client useProduction()
 * @method Client useLive()
 * @method Client useSandbox()
 * @method Client overrideEnvironment($environment)
 * @method Client overrideAccessToken($accessToken)
 *
 * @see Client
 */

class GoCardless extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Client::class;
    }
}