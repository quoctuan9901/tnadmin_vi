<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function manufacturer()
	{
	    return $this->belongsTo('App\Models\Manufacturer','manufacturer_id');
	}

	public function user()
	{
	    return $this->belongsTo('App\Models\User','user_id');
	}

	public function product_image()
    {
        return $this->hasMany('App\Models\Images_Product');
    }

    public function product_attribute()
    {
        return $this->hasMany('App\Models\Attribute_Product');
    }

    public function attribute()
    {
        return $this->belongsToMany('App\Models\Attribute');
    }
}
