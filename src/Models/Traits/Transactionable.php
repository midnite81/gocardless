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

    /**
     * Create a transaction from the parent model
     *
     * @param       $action
     * @param array $data
     */
    public function addTransaction($action, array $data)
    {
        $transaction = $this->transactions()->create([
           'action' => $action
        ]);

        if (! empty($data)) {
            foreach($data as $key=>$value) {
                $transaction->data()->create([
                    'key' => $key,
                    'value' => (! is_string($value)) ? json_encode($value) : $value,
                ]);
            }
        }
    }
}