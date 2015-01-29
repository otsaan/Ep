<?php namespace Ep\Registration\Events;

class UserRegistered {
    public $user;

    function __construct($user)
    {
        $this->user = $user;
    }

} 