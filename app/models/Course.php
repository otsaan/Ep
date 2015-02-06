<?php

class Course extends \Eloquent {

    protected $guarded = array('id');
    protected $hidded = array('created_at','updated_at');

    public function professor()
    {
        return $this->belongsToMany('Professor');
    }

    
}