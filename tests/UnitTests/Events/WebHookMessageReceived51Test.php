<?php

namespace Midnite81\GoCardless\Tests\UnitTests\Events;


use Event;
use Illuminate\Http\Request;
use Midnite81\GoCardless\Events\WebHookMessageReceived51;
use Midnite81\GoCardless\Tests\BaseTestCase;

class WebHookMessageReceived51Test extends BaseTestCase
{

    /** 
     * @test 
     */
    public function it_gets_dispatched()
    {
        Event::fake();

        $request = new Request();

        event(new WebHookMessageReceived51($request));

        Event::assertDispatched(WebHookMessageReceived51::class);
    }
}