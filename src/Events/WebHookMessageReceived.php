<?php

namespace Midnite81\GoCardless\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class WebHookMessageReceived
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var false|string
     */
    protected $data;

    /**
     * Create a new event instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->data = [
          'data' => $request->post(),
          'ip' => $request->ip(),
          'url' => $request->fullUrl()
        ];
    }

    /**
     * Get the contents of the inbound webhook
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data['data'];
    }

    /**
     * Get the ip of the inbound webhook
     *
     * @return mixed
     */
    public function getIp()
    {
        return $this->data['ip'];
    }

    /**
     * Get the url used by the inbound webhook
     *
     * @return mixed
     */
    public function getUrl()
    {
        return $this->data['url'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
