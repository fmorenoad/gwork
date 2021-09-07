<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table = 'works';
    protected $primaryKey = 'id';

    protected $fillable = [
        'project_id', 'user_id', 'refwork_id', 'normal_hour', 'extra_hour','frequency', 'highway',
        'route', 'direction', 'start', 'end', 'origin', 'amount_of_work', 'observation', 'num_minuta', 'ficha_accidente', 'created_at', 'contract_id', 'service_id'
    ];

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function refwork()
    {
        return $this->belongsTo(Refwork::class);
    }

    public function refresource()
    {
        return $this->hasOneThrough(Refresource::class, Resource::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
