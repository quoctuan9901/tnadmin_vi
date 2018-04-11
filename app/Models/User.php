<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'level', 'status', 'avatar', 'firstname', 'lastname' , 'phone', 'address', 'facebook', 'created_at', ' updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function category()
    {
        return $this->hasMany('App\Models\Category','user_id','id');
    }

    public function post()
    {
        return $this->hasMany('App\Models\Post','user_id','id');
    }

    public function tags()
    {
        return $this->hasMany('App\Models\Tags','user_id','id');
    }

    public function news()
    {
        return $this->hasMany('App\Models\News','user_id','id');
    }

    public function product()
    {
        return $this->hasMany('App\Models\Product','user_id','id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function hasRole($role)
    {
        if (!empty(\Auth::user()->role_id)) {
            $user_role_id = \Auth::user()->role_id;
            $role_obj     = \DB::table('role')->where('id',$user_role_id)->first();
            $role_array   = json_decode($role_obj->role);
            if (in_array($role,$role_array)) {
                return true;
            }
        }
        return false;
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
}
