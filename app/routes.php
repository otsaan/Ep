<?php
use Ep\Factory\UserFactory;

Route::get('/', function()
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
	return View::make('index');
});

Route::get('/login', function()
{
    return View::make('login');
});

Route::get('/signup', function()
{
    return View::make('signup');
});
