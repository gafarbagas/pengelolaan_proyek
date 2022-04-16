<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    public $table = 'progresses';
    protected $fillable = ['project_id', 'period', 'act_cost', 'progress'];

    public function project()
    {
        return $this->belongsTo('App\Project', ['project_id', 'id']);
    }
}
