<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'description', 'enterprise_id', 'code'
    ];

    public function users()
    {
        return $this->BelongsToMany(User::class)->withTimestamps();
    }

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
