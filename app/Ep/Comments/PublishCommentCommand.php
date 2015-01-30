<?php namespace Ep\Comments;

class PublishCommentCommand {

    public $content;
    public $postId;
    public $userId;

    function __construct($content, $postId, $userId)
    {
        $this->content = $content;
        $this->postId = $postId;
        $this->userId = $userId;
    }

}