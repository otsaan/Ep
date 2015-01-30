<?php namespace Ep\Posts;

class PublishPostCommand {

    public $content;
    public $channelId;
    public $userId;

    function __construct($content, $channelId, $userId)
    {
        $this->content = $content;
        $this->channelId = $channelId;
        $this->userId = $userId;
    }


}