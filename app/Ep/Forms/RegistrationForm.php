<?php namespace Ep\Forms;


use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {


    /*
     * validation rules for registration form
     */
    protected $rules = [
        'first_name'=>'required',
        'last_name'=>'required',
        'username' => 'required|unique:users',
        'is_type' => 'in:etudiant,professeur,laureat',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed'

    ];
}

 