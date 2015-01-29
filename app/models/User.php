<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Commander\Events\EventGenerator;
use Ep\Registration\Events\UserRegistered;


class User extends Eloquent implements UserInterface {


    use UserTrait, RemindableTrait, EventGenerator;

    //protected $hidden = array('password', 'remember_token');
    protected $fillable = array('username', 'email', 'password', 'is_type', 'first_name', 'last_name');

    /*
     * Hash the password
     */
    public function setPasswordAttribute($password)
    {

        $this->attributes["password"] = Hash::make($password);
    }

    public static function register($is_type, $email, $first_name, $last_name, $password, $username)
    {

        $user = new static(compact('username', 'email', 'password', 'is_type', 'first_name', 'last_name'));

        $user->raise(new UserRegistered($user));
        return $user;

    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

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
