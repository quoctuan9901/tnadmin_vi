<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $table = 'page_contents';
    protected $guarded = [];

    public function pageContent ()
    {
        return $this->belongsTo('App\Models\PageContent','page_id');
    }
}
