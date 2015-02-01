<?php namespace Ep\Comments;

use Ep\Core\TimeabableTrait;
use Laracasts\Presenter\Presenter;

class CommentPresenter extends Presenter {

    use TimeabableTrait;

    public function recentTime()
    {
        return $this->time_elapsed_string($this->updated_at);

    }

    public function liked()
    {
        return $this->entity->liked();
    }
}