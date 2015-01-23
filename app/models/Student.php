<?php


class Student extends Eloquent {
    protected $fillable = [];

    public function user()
    {
        return $this->morphOne('User', 'is');
    }
} 
