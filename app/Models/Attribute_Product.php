<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute_Product extends Model
{
    protected $table = 'attribute_product';
    protected $guarded = [];
    public $timestamps = false;

    public function attribute()
	{
	    return $this->belongsTo('App\Models\Attribute','attribute_id');
	}
}
