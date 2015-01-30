<?php namespace Ep\Forms;

use Laracasts\Validation\FormValidator;

class PublishPostForm  extends FormValidator{

    /*
    * validation rules for publishing a new post
    */
    protected $rules = [
        'post-content'=>'required'
    ];
}