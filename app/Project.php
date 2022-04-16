<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['project_code','project_name', 'client_name', 'developer_id', 'status_id', 'price', 'project_start', 'project_finish', 'pj'];

    public function progress()
    {
        return $this->hasMany('App\Progress');
    }
    
    public function developer()
    {
        return $this->belongsTo('App\Developer');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}

