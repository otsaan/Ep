<?php namespace Ep\Posts;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\EventDispatcher;
use Post;

class PublishPostCommandHandler implements CommandHandler {

    private $post;
    private $dispatcher;

    function __construct(Post $post, EventDispatcher $dispatcher)
    {
        $this->post = $post;
        $this->dispatcher = $dispatcher;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $post = $this->post->publish($command->content, $command->channelId, $command->userId);
        $this->dispatcher->dispatch($post->releaseEvents());

    }
}