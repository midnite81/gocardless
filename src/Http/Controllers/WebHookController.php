<?php

namespace Midnite81\GoCardless\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Midnite81\GoCardless\Events\WebHookMessageReceived;

class WebHookController extends Controller
{
    public function store(Request $request)
    {
        event(new WebHookMessageReceived($request));
    }
}
