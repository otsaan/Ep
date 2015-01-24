<?php


class Graduate extends Eloquent {

    protected $guarded = array('id');
    protected $hidded = array('created_at','updated_at');


    public function user()
    {
        return $this->morphOne('User', 'is');
    }

}