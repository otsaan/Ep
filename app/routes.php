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
/* ======================================= */


/*========================ROUTES PROTECTED BY AUTH===================*/
Route::group(array('before' => 'auth'), function()
{
    Route::resource('channels','ChannelsController');
    Route::resource('channels.posts','PostsController');

    Route::get('feed','PostsController@all');
    Route::post('/{postId}/comments','CommentsController@store');


    // Show profile
    /* ======================================= */
    Route::get('@{username}', [
        'as' => 'profile',
        'uses' => 'UsersController@show'
    ]);
    // Likes
    /* ======================================= */
    Route::post('like', array('as' => 'like', 'uses' => 'PostsController@like'));
    Route::post('clike', array('before' => 'liking-comment', 'as' => 'clike', 'uses' => 'CommentsController@like'));
});
/*=====================================================================*/



// reset password
/* ======================================= */
Route::controller('password', 'RemindersController');
/* ======================================= */


// Mark notifications as read
/* ======================================= */
Route::get('notifications/read',[
    'as'=>'read_notifications',
   'uses'=> 'notificationsController@read'
]);
/* ======================================= */




// 404 not found
/* ======================================= */
App::missing(function($exception)
{
    return Response::view('missing', array(), 404);
    // App::abort(404);
});

route::get('manageChannels',[
    'as' => 'manageChannels_path',
    'uses' => 'ChannelsController@manage'
]);
route::post('/channels/search',[
    'as' => 'search_channels_path',
    'uses' => 'ChannelsController@search'
]);
route::post('/channels/join',[
    'as' => 'join_path',
    'uses' => 'ChannelsController@join'
]);

route::get('/user/channels',[
    'as' => 'user_channels',
    'uses' => 'ChannelsController@userChannels'
]);
route::post('channel/withdraw',[
    'as' => 'withdraw_path',
    'uses' => 'ChannelsController@withdraw'
]);
route::get('test',function(){


    return \Cmgmyr\Messenger\Models\Thread::forUserWithNewMessages(Auth::user()->id);

});

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});
