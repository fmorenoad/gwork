<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'year', 'month', 'status',
    ];
}
