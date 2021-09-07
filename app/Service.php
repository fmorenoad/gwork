<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'contract_id', 'code', 'name', 'description', 'unit', 'amount', 'cost', 'money','variable_cost'
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
