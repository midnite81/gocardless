<?php
namespace Midnite81\GoCardless\Models\Traits;

use Midnite81\GoCardless\Models\Transaction;

trait Transactionable
{
    /**
     * The Transaction Relationship
     */
    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
}