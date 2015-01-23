<?php

/**
 * Created by PhpStorm.
 * User: otm
 * Date: 22/01/15
 * Time: 22:47
 */

class Professor extends Eloquent {
    protected $fillable = [];

    public function users() {
        return $this->morphOne('User','is');
    }
} 

