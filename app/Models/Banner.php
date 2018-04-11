<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
    protected $guarded = [];

    public function position()
	{
	    return $this->belongsTo('App\Models\Position','position_id');
	}

	public function user()
	{
	    return $this->belongsTo('App\Models\User','user_id');
	}
}
