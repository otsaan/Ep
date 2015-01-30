<?php

class Channel extends Eloquent {

    protected $guarded = array('id');
    protected $hidded = array('created_at','updated_at');


    public function users()
    {
        return $this->belongsToMany('User');
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function tasks()
    {
        return $this->hasMany('Task');
    }

    public function comments()
    {
        return $this->hasManyThrough('Comment','Post');
    }

} 
