<?php


App::bind('Laracasts\Commander\CommandTranslator','Laracasts\Commander\BasicCommandTranslator');
Event::listen('Ep.Posts.PostWasPublished','Ep\Listeners\EmailNotifier');



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
    'as' => 'register_path',
    'uses' => 'RegistrationController@store'
]);

// GET showing all post on a channel (feed)
Route::get('/feed', [
    'as' => 'getFeed',
    'uses' => 'ChannelController@index'
]);

// POST for creating a new channel
Route::post('/channel/create', [
    'as' => 'postChannel',
    'uses' => 'ChannelController@store'
]);

// POST create a new post
Route::post('/feed', [
    'as' => 'postFeed',
    'uses' => 'PostController@store'
]);

