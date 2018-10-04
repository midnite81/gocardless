<?php

namespace Midnite81\GoCardless\Events;

use Illuminate\Queue\SerializesModels;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class WebHookMessageReceived51 extends AbstractWebHook
{
    use SerializesModels;

}
