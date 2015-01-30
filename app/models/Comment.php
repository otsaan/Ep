<?php

use Ep\Comments\CommentWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Comment extends \Eloquent {

    use EventGenerator, PresentableTrait;

    protected $fillable = [];
    protected $presenter = 'Ep\Comments\CommentPresenter';


    public function user()
    {
        return $this->BelongsTo('User');
    }

    public function post()
    {
        return $this->BelongsTo('Post');
    }

    public function publish($content, $postId, $userId)
    {
        // get the post and the user related to this post
        $post = Post::findOrFail($postId);
        $user = User::findOrFail($userId);

        // set them
        $this->content = $content;
        $this->post()->associate($post);
        $this->user()->associate($user);

        // then save the comment
        $this->save();

        // raise the event
        $this->raise(new CommentWasPublished($this));

        // return the comment to the handler to dispatch it
        return $this;
    }

}