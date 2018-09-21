<?php
namespace Midnite81\GoCardless\Tests\UnitTests\Services;

use Midnite81\GoCardless\Tests\BaseTestCase;

class ClientTest extends BaseTestCase
{
    /** @var \Midnite81\GoCardless\Contracts\Services\Client */
    protected $client;

    protected function setUp()
    {
        parent::setUp();
        $this->client = app(\Midnite81\GoCardless\Contracts\Services\Client::class);
    }

    /**
     * @test
     */
    public function it_implements_a_contract()
    {
        $this->assertInstanceOf(\Midnite81\GoCardless\Contracts\Services\Client::class, $this->client);
    }

    /**
     * @test
     */
    public function it_returns_a_client()
    {
        $this->assertInstanceOf(\GoCardlessPro\Client::class, $this->client->getClient());
    }


    /**
     * @test
     */
    public function it_returns_a_client_when_set_production_is_set()
    {
        $client = $this->client->useProduction()->getClient();

        $this->assertInstanceOf(\GoCardlessPro\Client::class, $client);
    }


    /**
     * @test
     */
    public function it_returns_a_client_when_set_live_is_set()
    {
        $client = $this->client->useLive()->getClient();

        $this->assertInstanceOf(\GoCardlessPro\Client::class, $client);
    }


    /**
     * @test
     */
    public function it_returns_a_client_when_set_sandbox_is_set()
    {
        $client = $this->client->useSandbox()->getClient();

        $this->assertInstanceOf(\GoCardlessPro\Client::class, $client);
    }


    /**
     * @test
     */
    public function it_returns_a_client_when_set_override_access_is_set()
    {
        $client = $this->client->overrideAccessToken('test')->getClient();

        $this->assertInstanceOf(\GoCardlessPro\Client::class, $client);
    }

    /**
     * @test
     */
    public function it_returns_a_client_when_set_override_environment_is_set()
    {
        $client = $this->client->overrideEnvironment('live')->getClient();

        $this->assertInstanceOf(\GoCardlessPro\Client::class, $client);
    }
}