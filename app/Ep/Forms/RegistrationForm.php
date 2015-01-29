<?php namespace Ep\Forms;


use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {


    /*
     * validation rules for registration form
     */
    protected $rules = [
        'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed'
    ];
}

 