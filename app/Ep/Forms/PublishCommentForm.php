<?php namespace Ep\Forms;

use Laracasts\Validation\FormValidator;

class PublishCommentForm extends FormValidator {

    /*
   * validation rules for publishing a new post
   */
    protected $rules = [
        'reply-content'=>'required'
    ];

}