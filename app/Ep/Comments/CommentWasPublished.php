<?php namespace Ep\Comments;

use Comment;

class CommentWasPublished {

    public $comment;

    function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }


}