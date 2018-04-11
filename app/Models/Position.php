<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'position';
    protected $guarded = [];

    public function user()
	{
	    return $this->belongsTo('App\Models\User','user_id');
	}

	public function banner()
    {
        return $this->hasMany('App\Models\Banner');
    }
}
