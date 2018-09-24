<?php

namespace Midnite81\GoCardless\Http\Controllers;

use Illuminate\Http\Request;
use Midnite81\GoCardless\Events\WebHookMessageReceived;
use Midnite81\GoCardlessHttp\Controllers\Controller;

class WebHookController extends Controller
{
    public function store(Request $request)
    {
        event(new WebHookMessageReceived($request));
    }
}
