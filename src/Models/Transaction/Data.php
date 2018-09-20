<?php
namespace Midnite81\GoCardless\Models\Transaction;

use Midnite81\GoCardless\Models\Model;

class Data extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gocardless_transaction_data';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}