<?php

class Attachment extends \Eloquent {

    protected $guarded = array('id');
    protected $hidded = array('created_at','updated_at');

    public function attachable()
    {
        return $this->morphTo();
    }
}