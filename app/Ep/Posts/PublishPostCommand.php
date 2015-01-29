<?php namespace Ep\Posts;

class PublishPostCommand {

    private $content;

    function __construct($content)
    {
        $this->content = $content;
    }

}