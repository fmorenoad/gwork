<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refresource extends Model
{
    protected $table = 'refresources';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id', 'type', 'code', 'resource', 'unit', 'observation'
    ];

    public function costs()
    {
        return $this->hasMany(Cost::class);
    }
}
