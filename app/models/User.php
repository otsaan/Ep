<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent {


    use UserTrait, RemindableTrait;

    protected $hidden = array('password', 'remember_token');
    protected $fillable = array('*');


    public function is()
    {
        return $this->morphTo();
    }


    public function comments()
    {
        return $this->hasMany('Comment');
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function channels()
    {
        return $this->belongsToMany('Channel');
    }

}
