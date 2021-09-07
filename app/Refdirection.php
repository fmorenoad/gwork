<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refdirection extends Model
{
    
    protected $table = 'refdirections';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id', 'direction', 'description'
    ];
}
