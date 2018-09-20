<?php
namespace Midnite81\GoCardless\Models\Traits;

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