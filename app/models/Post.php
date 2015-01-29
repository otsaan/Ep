<?php

use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\Contracts\PresentableInterface;
use Laracasts\Presenter\PresentableTrait;

class Post extends \Eloquent implements  PresentableInterface {

    use EventGenerator;
    use PresentableTrait;

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

    public function publish($content)
    {
        dd($content);
        $this->content = $content;
        //$this->save();
        dd("post saved");
        $event = new PostWasPublished($content);
        $this->raise($event);

        return $this;
    }
}