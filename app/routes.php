<?php
use Ep\Factory\UserFactory;

App::bind('Laracasts\Commander\CommandTranslator','Laracasts\Commander\BasicCommandTranslator');
Route::get('/store','PostController@store');
Event::listen('Ep.Posts.PostWasPublished','EmailNotifier');



Route::get('/', [
    'as' => 'home',
    'uses' => "pagesController@home"
]);


Route::get('/login', function () {
    return View::make('login');
});

Route::get('/signup', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@index'
]);
Route::post('/signup', [

]);

Route::get('/home', function()
{

    /*
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
    */
    $posts = Channel::findOrFail(4)->posts;


    return View::make('channels.feed', compact('posts'));
});

