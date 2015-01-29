<?php
use Ep\Factory\UserFactory;

Route::get('/', [
    'as' => 'home',
    'uses' => "sessionsController@index"
]);
Route::get('timeline', [
    'as' => 'timeline',
    'uses' => "pagesController@index"
]);


/*function()
{

    --------- UserFactory Tests---------
        run 'composoer dump-autoload' to load UserFactory class

    UserFactory::createStudent([
        'first_name' => 'student',
        'last_name' => 'student',
        'cne' => '11762398'
    ]);

    UserFactory::createGraduate([
        'first_name' => 'graduate',
        'last_name' => 'graduate',
        'graduation_year' => '2000',
        'job' => 'CEO'
    ]);

    UserFactory::createProfessor([
        'first_name' => 'Professor',
        'last_name' => 'Professor'
    ]);

    -------------------------------------
return View::make('index');
});*/

/*
 * SignIn
 */
Route::get('/login',  [
    'as'=>'login_path',
    'uses'=>'sessionsController@index'
]);
Route::get('/signout',  [
    'as'=>'signout_path',
    'uses'=>'sessionsController@destroy'
]);
Route::post('/login', [
    'as'=>'login_path',
    'uses'=>'sessionsController@store'
]);


/*
 * Signup
 */
Route::get('/signup', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@index'
]);
Route::post('/signup', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@store'
]);
