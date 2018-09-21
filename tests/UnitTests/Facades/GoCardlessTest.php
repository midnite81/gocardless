<?php
namespace Midnite81\GoCardless\Tests\Facades;

use GoCardlessPro\Client;
use Midnite81\GoCardless\Facades\GoCardless;

class GoCardlessTest extends \Midnite81\GoCardless\Tests\BaseTestCase
{
    /**
     * @test
     */
    public function it_provides_a_concrete_client()
    {
        $client = GoCardless::getClient();

        $this->assertInstanceOf(Client::class, $client);
    }
}