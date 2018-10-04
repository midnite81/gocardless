<?php
namespace Midnite81\GoCardless\Models\Transaction;

use Midnite81\GoCardless\Models\Model;
use Midnite81\GoCardless\Models\Transaction;

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

    /**
     * The Transaction Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}