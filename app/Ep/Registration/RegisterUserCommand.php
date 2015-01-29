<?php namespace Ep\Registration;

class RegisterUserCommand {

    public $first_name;

    public $last_name;

    public $username;

    public $is_type;

    public $email;

    public $password;

    function __construct($is_type, $email, $first_name, $last_name, $password, $username)
    {
        $this->is_type = $is_type;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->password = $password;
        $this->username = $username;
    }


} 