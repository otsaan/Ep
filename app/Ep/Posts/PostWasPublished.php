<?php namespace Ep\Posts;


class PostWasPublished {

    public $post;

    function __construct($post)
    {
        $this->post = $post;
    }

}