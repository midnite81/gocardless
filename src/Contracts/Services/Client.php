<?php
namespace Midnite81\GoCardless\Contracts\Services;

interface Client
{

    /**
     * Get the client
     *
     * @return \Midnite81\GoCardless\Services\Client
     */
    public function getClient();

    /**
     * Set GoCardless to use Production
     *
     * @return \Midnite81\GoCardless\Services\Client
     */
    public function useProduction();

    /**
     * Alias for Use Production
     *
     * @return \Midnite81\GoCardless\Services\Client
     */
    public function useLive();

    /**
     * Set GoCardless to use Sandbox
     *
     * @return \Midnite81\GoCardless\Services\Client
     */
    public function useSandbox();

    /**
     * Set environment
     *
     * @param string $environment
     * @return \Midnite81\GoCardless\Services\Client
     */
    public function overrideEnvironment($environment);

    /**
     * Set Access Token
     *
     * @param string $accessToken
     * @return \Midnite81\GoCardless\Services\Client
     */
    public function overrideAccessToken($accessToken);
}