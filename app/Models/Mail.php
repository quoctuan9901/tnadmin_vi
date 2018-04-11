<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $table = 'mail';
    protected $guarded = [];

    public function user()
	{
	    return $this->belongsTo('App\Models\User','user_id');
	}
}
