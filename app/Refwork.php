<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refwork extends Model
{
    protected $table = 'refworks';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id', 'item', 'work', 'unit',
    ];


}
