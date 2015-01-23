<?php

class Graduate extends Eloquent {
    protected $fillable = [];


    public function user()
    {
        return $this->morphOne('User', 'is');
    }
}