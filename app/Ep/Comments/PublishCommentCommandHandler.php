<?php namespace Ep\Comments;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\EventDispatcher;
use Comment;

class PublishCommentCommandHandler implements CommandHandler {

    private $comment;
    private $dispatcher;

    function __construct(Comment $comment, EventDispatcher $dispatcher)
    {
        $this->comment = $comment;
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
        $comment = $this->comment->publish($command->content, $command->postId, $command->userId);
        $this->dispatcher->dispatch($comment->releaseEvents());
    }
}