<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    protected $guarded = [];

    public function user()
	{
	    return $this->belongsTo('App\Models\User','user_id');
	}
}
