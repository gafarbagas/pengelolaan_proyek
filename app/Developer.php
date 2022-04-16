<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $table = "developers";

    protected $fillable = ['developer_code', 'category_id','developer_name', 'email', 'telp'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function project()
    {
        return $this->hasMany('App\Project');
    }
}
