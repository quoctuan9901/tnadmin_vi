<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $guarded = [];

    public function pageContent ()
    {
        return $this->hasMany('App\Models\PageContent');
    }
}
