<?php namespace Ep\Posts;

use Laracasts\Presenter\Presenter;

class PostPresenter extends Presenter {

    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


}