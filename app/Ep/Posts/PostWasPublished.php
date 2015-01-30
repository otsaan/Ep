<?php namespace Ep\Posts;

use Post;

class PostWasPublished {

    public $post;

    function __construct(Post $post)
    {
        $this->post = $post;
    }

}