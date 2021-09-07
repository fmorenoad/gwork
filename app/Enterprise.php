<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $table = 'enterprises';
    protected $primaryKey = 'id';

    protected $fillable = [
        'enterprise', 'rut'
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
