<?php
namespace Midnite81\GoCardless\Models;

use Midnite81\GoCardless\Models\Transaction\Data;

class Transaction extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'gocardless_transactions';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = ['id'];

    /**
     * The Transactionable Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function transactionable()
    {
        return $this->morphTo();
    }

    /**
     * The Data Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function data()
    {
        return $this->hasMany(Data::class);
    }
}