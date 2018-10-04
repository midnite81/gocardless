<?php

namespace Midnite81\GoCardless\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WebHookMessageReceived54 extends AbstractWebHook
{
    use Dispatchable, SerializesModels;

}
