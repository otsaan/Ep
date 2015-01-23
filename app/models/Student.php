<?php

/**
 * Created by PhpStorm.
 * User: otm
 * Date: 22/01/15
 * Time: 22:42
 */

class Student extends Eloquent {
    protected $fillable = [];

    public function users() {
        return $this->morphMany('User','is');
    }
} 
