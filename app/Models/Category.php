<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $guarded = [];

    public function user()
	{
	    return $this->belongsTo('App\Models\User','user_id');
	}

	public function news()
    {
        return $this->belongsToMany('App\Models\News');
    }

    public function product()
    {
        return $this->belongsToMany('App\Models\Product');
    }

}
