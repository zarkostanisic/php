<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'is_active', 'name', 'email', 'password', 'image_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function image(){
        return $this->belongsTo('App\Image');
    }

    public function isAdmin(){

        if($this->role->name == 'administrator' && $this->is_active == 1) return true;

        return false;
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function getGravatarAttribute(){
        $hash = md5(strtolower(trim($this->attributes['email'])));

        return 'http://gravatar.com/avatar/'.$hash;
    }

}
