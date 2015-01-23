<?php

class Post extends \Eloquent {
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function comments()
    {
        return $this->hasMany("Comment");
    }
}