<?php
namespace Midnite81\GoCardless\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = gocardless_table_prefix($this->table);
    }
}