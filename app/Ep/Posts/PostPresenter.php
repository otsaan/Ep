<?php namespace Ep\Posts;

use Ep\Core\TimeabableTrait;
use Laracasts\Presenter\Presenter;

class PostPresenter extends Presenter {

    use TimeabableTrait;

    public function recentTime()
    {
        return $this->time_elapsed_string($this->entity->updated_at);
    }

    public function allComments()
    {
        return $this->entity->comments()->orderBy('created_at','asc')->get();
    }

    public function commentsCount()
    {
        $count = $this->entity->comments()->orderBy('created_at','asc')->count();

        if ($count > 1) {
            $output = '<i class="ion ion-android-chat"></i>&nbsp;' . $count . '&nbsp;Commentaires';
        } else if ($count == 1) {
            $output =  '<i class="ion ion-android-chat"></i>&nbsp;' . $count . '&nbsp;Commentaire';
        } else {
            $output = "";
        }

        return $output;
    }


}