<?php

class Comment extends \Eloquent {
    protected $fillable = [];

    public function user()
    {
        return $this->BelongsTo('User');
    }

    public function post()
    {
        return $this->BelongsTo('Post');
    }

}