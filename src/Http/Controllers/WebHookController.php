<?php

namespace Midnite81\GoCardless\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Midnite81\GoCardless\Events\WebHookMessageReceived51;
use Midnite81\GoCardless\Events\WebHookMessageReceived54;

class WebHookController extends Controller
{
    public function handle(Request $request)
    {
        if (app()->version() < 5.4) {
            event(new WebHookMessageReceived51($request));
        } else {
            event(new WebHookMessageReceived54($request));
        }

    }
}