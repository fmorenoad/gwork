<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reffrequency extends Model
{
    protected $table = 'reffrequencies';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id', 'frequency'
    ];
}
