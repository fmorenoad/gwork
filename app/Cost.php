<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $table = 'costs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'refresource_id', 'unit_of_money', 'cost', 'execution_date', 'month'
    ];

    public function refresource()
    {
        return $this->belongsTo(Refresource::class);
    }
}
