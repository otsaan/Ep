<?php

class Graduate extends Eloquent {
	protected $fillable = [];


    public function users() {
        return $this->morphOne('User','is');
    }
}