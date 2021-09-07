<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostHuman extends Model
{
    protected $table = 'cost_humans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'description','unit_service', 'amount_service', 'year', 'month', 'cost','money'
    ];

}
