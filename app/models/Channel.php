<?php

class Channel extends Eloquent {
    protected $fillable = [];

    public function users() {
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
} 
