<?php
namespace Midnite81\GoCardless\Services;

use GoCardlessPro\Client as GoCardlessClient;
use Midnite81\GoCardless\Contracts\Services\Client as Contract;

class Client implements Contract
{
    /** @var string */
    protected $accessToken;

    /** @var string */
    protected $environment;

    /** @var string */
    protected $overrideEnvironment;

    /** @var string */
    protected $overrideAccessToken;

    /**
     * GoCardless constructor.
     */
    public function __construct()
    {
        $this->initialise();
    }

    /**
     * Get the client
     *
     * @return GoCardlessClient
     * @throws \Exception
     */
    public function getClient()
    {
        return new GoCardlessClient($this->getCredentials());
    }

    /**
     * Set GoCardless to use Production
     *
     * @return Client
     */
    public function useProduction()
    {
        return $this->setEnvironment('production');
    }

    /**
     * Alias for Use Production
     *
     * @return Client
     */
    public function useLive()
    {
        return $this->useProduction();
    }

    /**
     * Set GoCardless to use Sandbox
     *
     * @return Client
     */
    public function useSandbox()
    {
        return $this->setEnvironment('sandbox');
    }

    /**
     * Set the environmet
     *
     * @param $string
     * @return $this
     */
    protected function setEnvironment($environment)
    {
        config()->set('gocardless.environment', $environment);
        $this->initialise();
        return $this;
    }


    /**
     * Set environment
     *
     * @param string $environment
     * @return Client
     */
    public function overrideEnvironment($environment)
    {
        $this->overrideEnvironment = $environment;
        $this->initialise();
        return $this;
    }

    /**
     * Set Access Token
     *
     * @param string $accessToken
     * @return Client
     */
    public function overrideAccessToken($accessToken)
    {
        $this->overrideAccessToken = $accessToken;
        $this->initialise();
        return $this;
    }

    /**
     * Initialise the class
     */
    protected function initialise()
    {
        $this->accessToken = ! empty($this->overrideAccessToken) ? $this->overrideAccessToken : gocardless_env('api_key');
        $this->environment = ! empty($this->overrideEnvironment) ? $this->overrideEnvironment : gocardless_env('environment');
    }

    /**
     * Get Credentials
     *
     * @return array
     */
    protected function getCredentials()
    {
        return [
            'access_token' => $this->accessToken,
            'environment'  => $this->environment,
        ];
    }
}