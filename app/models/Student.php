<?php

/**
 * Created by PhpStorm.
 * User: otm
 * Date: 22/01/15
 * Time: 22:42
 */

class Student extends Eloquent {
    protected $fillable = [];

    public function user() {
        return $this->morphOne('User','is');
    }
} 
