<?php

use Ep\Posts\PostWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\Contracts\PresentableInterface;
use Laracasts\Presenter\PresentableTrait;
use Conner\Likeable\LikeableTrait;

class Post extends \Eloquent implements PresentableInterface {
    use EventGenerator, PresentableTrait, LikeableTrait;


    protected $presenter = 'Ep\Posts\PostPresenter';

    protected $guarded = array('id');
    protected $hidded = array('created_at','updated_at');

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function comments()
    {
        return $this->hasMany("Comment");
    }

    public function channel()
    {
        return $this->belongsTo('Channel');
    }

    public function attachments()
    {
        return $this->morphMany('Attachment','attachable');
    }

    public function publish($content, $channelId, $userId)
    {
        // get the channel and the user related to this post
        $channel = Channel::findOrFail($channelId);
        $user = User::findOrFail($userId);

        // set them
        $this->content = $content;
        $this->channel()->associate($channel);
        $this->user()->associate($user);

        // then save the post
        $this->save();

        $this->raise(new PostWasPublished($this));

        return $this;
    }
}