<?php

class Task extends Eloquent {
    protected $fillable = [];

    public function professor()
    {
        return $this->belongsTo('Professor');
    }

    public function channel()
    {
        return $this->belongsTo('Channel');
    }

    public function attachments()
    {
        return $this->morphMany('Attachment', 'attachable');
    }
} 
