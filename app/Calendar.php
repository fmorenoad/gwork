<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = 'calendars';
    protected $primaryKey = 'id';

    protected $fillable = [
        'year', 'month', 'report', 'status', 'user_id', 'date_init', 'date_end', 'laboral_days'
    ];

}
