<?php

class Post extends \Eloquent {

    protected $guarded = array('id');
    protected $hidded = array('created_at','updated_at');

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function comments()
    {
        return $this->hasMany("Comment");
    }

    public function channel()
    {
        return $this->belongsTo('Channel');
    }

    public function attachments()
    {
        return $this->morphMany('Attachment','attachable');
    }
}