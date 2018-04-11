<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $table = 'manufacturer';
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany('App\Models\Product','manufacturer_id','id');
    }
}
