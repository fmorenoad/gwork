<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refroute extends Model
{
    protected $table = 'refroutes';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id', 'route'
    ];
}
