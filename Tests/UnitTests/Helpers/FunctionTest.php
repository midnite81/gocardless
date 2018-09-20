<?php
namespace Midnite81\GoCardless\Tests\UnitTests\Helpers;

use GoCardlessPro\Client;
use Midnite81\GoCardless\Tests\BaseTestCase;

class FunctionTest extends BaseTestCase
{
    /**
     * @test
     */
    public function it_provides_a_concrete_client()
    {
        $client = gocardless()->getClient();

        $this->assertInstanceOf(Client::class, $client);
    }

    /**
     * @test
     */
    public function it_provides_environmental_variables()
    {
        $config = gocardless_env();

        $this->assertInternalType('array', $config);
        $this->assertArrayHasKey('api_key', $config);
        $this->assertArrayHasKey('environment', $config);
    }


    /**
     * @test
     */
    public function it_can_get_a_property_from_the_environmental_env()
    {
        $environment = gocardless_env('environment');

        $this->assertInternalType('string', $environment);
        $this->assertEquals('live', $environment);
    }
}