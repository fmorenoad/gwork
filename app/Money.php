<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    protected $table = 'money';
    protected $primaryKey = 'id';

    protected $fillable = [
        'money', 'year', 'month', 'clp'
    ];
}
