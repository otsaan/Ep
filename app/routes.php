<?php

App::bind('Laracasts\Commander\CommandTranslator','Laracasts\Commander\BasicCommandTranslator');
// Example of a notifier who listens to all event and echo a simple message
Event::listen('Ep.*','Ep\Listeners\Notifier');


    /* ============== Home ================*/
    Route::get('/', [
        'as' => 'home',
        'uses' => "sessionsController@index"
    ]);

    Route::get('timeline', [
        'as' => 'timeline',
        'uses' => "pagesController@index"
    ]);

    Route::get('/', [
        'as' => 'home',
        'uses' => "pagesController@home"
    ]);
    /*=======================================*/


    /* ============== Logout ================*/
    Route::get('/signout',  [
        'as'=>'signout_path',
        'uses'=>'sessionsController@destroy'
    ]);
    /*=======================================*/


    /*============== Login ==================*/
    Route::get('/login',  [
        'as'=>'login_path',
        'uses'=>'sessionsController@index'
    ]);
    Route::post('/login', [
        'as'=>'login_path',
        'uses'=>'sessionsController@store'
    ]);
    /*=======================================*/


    /*=============== Signup ================*/
    Route::get('/signup', [
        'as' => 'register_path',
        'uses' => 'RegistrationController@index'
    ]);

    Route::post('/signup', [
        'as' => 'register_path',
        'uses' => 'RegistrationController@store'
    ]);
    /*=======================================*/


    // POST for creating a new channel
    /* ======================================= */
    Route::post('/channels', [
        'as' => 'postChannel',
        'uses' => 'ChannelController@store'
    ]);


    // GET showing all posts on a channel (feed)
    /* ======================================= */
    Route::get('/feed', [
        'as' => 'getFeed',
        'uses' => 'ChannelController@index'
    ]);

    // POST create a new post
    Route::post('/feed', [
        'as' => 'postFeed',
        'uses' => 'PostController@store'
    ]);
    /* ======================================= */


    // POST create a new comment
    /* ======================================= */
    Route::post('/comments', [
        'as' => 'postComment',
        'uses' => 'CommentController@store'
    ]);
    /* ======================================= */
