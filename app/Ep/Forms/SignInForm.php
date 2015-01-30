<?php namespace Ep\Forms;

use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator {

    protected  $rules=[
      'username'=>'required',
      'password'=>'required'
    ];
} 