<?php namespace Ep\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}