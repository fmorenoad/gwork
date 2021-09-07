<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refhighway extends Model
{
    protected $table = 'refhighways';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id', 'highway'
    ];
}
