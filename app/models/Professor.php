<?php


class Professor extends Eloquent {
    protected $fillable = [];

    public function user()
    {
        return $this->morphOne('User', 'is');
    }

    public function courses()
    {
        return $this->belongsToMany('Course');
    }
}

