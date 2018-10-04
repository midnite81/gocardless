<?php

namespace Midnite81\GoCardless\Events;

abstract class AbstractWebHook
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $ip;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $method;

    /**
     * Create a new event instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->data = $request->all();
        $this->ip = $request->ip();
        $this->url = $request->fullUrl();
        $this->method = $request->method();

    }

    /**
     * Get the contents of the inbound webhook
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the ip of the inbound webhook
     *
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Get the url used by the inbound webhook
     *
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     *
     */
    public function getMethod()
    {
        return $this->method;
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