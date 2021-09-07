<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'work_id', 'type', 'route'
    ];
}
