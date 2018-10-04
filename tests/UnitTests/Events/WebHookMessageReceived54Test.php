<?php

namespace Midnite81\GoCardless\Tests\UnitTests\Events;


use Event;
use Illuminate\Http\Request;
use Midnite81\GoCardless\Events\WebHookMessageReceived54;
use Midnite81\GoCardless\Tests\BaseTestCase;

class WebHookMessageReceived54Test extends BaseTestCase
{

    /** 
     * @test 
     */
    public function it_gets_dispatched()
    {
        if (app()->version() >= 5.4) {
            Event::fake();

            $request = new Request();

            event(new WebHookMessageReceived54($request));

            Event::assertDispatched(WebHookMessageReceived54::class);
        }
    }
}