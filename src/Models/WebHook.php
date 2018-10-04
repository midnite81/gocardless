<?php

namespace Midnite81\GoCardless\Models;

class WebHook extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gocardless_webhooks';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}