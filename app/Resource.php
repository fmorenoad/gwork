<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table = 'resources';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'work_id','user_id','type','refresource_id','unit','quantity', 'observation', 'is_active', 'user_id'
    ];

    protected $attributes = [
        'is_active' => 1,
        'unit' => 'sin unidad indicada',
        'observation' => 'sin descripción'
    ];


    public function resource_lists()
    {
        return $this->hasOne(ResourceList::class, 'resource_list_id');
    }

    public function refresource()
    {
        return $this->belongsTo(Refresource::class);
    }

    public function costs()
    {
        return $this->hasMany(Cost::class, 'refresource_id', 'refresource_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
