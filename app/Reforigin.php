<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reforigin extends Model
{
    protected $table = 'reforigins';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id', 'origin', 'description'
    ];
}
