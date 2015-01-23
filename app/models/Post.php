<?php

class Post extends \Eloquent {
	protected $fillable = [];

    public function user() {
        return $this->hasOne('User');
    }

    public function comments() {
        return $this->hasMany("Comment");
    }
}