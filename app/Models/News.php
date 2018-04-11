<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function user()
	{
	    return $this->belongsTo('App\Models\User','user_id');
	}

    public function news_image () {
        return $this->hasMany('App\Models\Images_News');
    }
}
