<?php namespace Ep\Posts;


class PostWasPublished {

    private $post;

    function __construct($post)
    {
        $this->post = $post;
    }

}