<?php

App::bind('Laracasts\Commander\CommandTranslator','Laracasts\Commander\BasicCommandTranslator');
// Example of a notifier who listens to all event and echo a simple message
Event::listen('Ep.*','Ep\Listeners\Notifier');


/* ============== Home ================*/
Route::get('/', [
    'as' => 'home',
    'uses' => "SessionsController@index"
]);
Route::get('timeline', [
    'as' => 'timeline',
    'uses' => "pagesController@index"
]);
/*=======================================*/


/* ============== Logout ================*/
Route::get('/signout',  [
    'as'=>'signout_path',
    'uses'=>'SessionsController@destroy'
]);
/*=======================================*/


/*============== Login ==================*/
Route::get('/login',  [
    'as'=>'login_path',
    'uses'=>'SessionsController@index'
]);
Route::post('/login', [
    'as'=>'login_path',
    'uses'=>'SessionsController@store'
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
    Route::post('user/add', [
        'as' => 'add_user_path',
        'uses' => 'ChannelsController@AddUser'
    ]);
    // Show profile
    /* ======================================= */
    Route::get('@{username}', [
        'as' => 'profile',
        'uses' => 'UsersController@show'
    ]);
    // user's profile update
    /* ======================================= */
    Route::post('user/update', [
        'as' => 'user_update_path',
        'uses' => 'UsersController@update'
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



Route::post('modifierimg', [
    'as'=>'modifier-img',
    'uses'=>'UsersController@editImg'
]);

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
route::get('/channel/{id}/join',[
    'as' => 'join_path',
    'uses' => 'ChannelsController@join'
]);

route::get('/user/channels',[
    'as' => 'user_channels',
    'uses' => 'ChannelsController@userChannels'
]);
route::get('channel/{id}/withdraw',[
    'as' => 'withdraw_path',
    'uses' => 'ChannelsController@withdraw'
]);

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Route::post('upload', [
    'as' => 'upload',
    'uses' => 'PostsController@upload'
]);


//Admin page
Route::post('deletepost', 'PostsController@destroy');

/* ======================================= */
Route::get('admin', 'AdminController@users');
Route::get('admin/users', 'AdminController@users');
Route::get('admin/groups', 'AdminController@groups');
Route::get('admin/groups/{id}/delete', 'AdminController@destroyChannel');
Route::get('admin/posts/{id}/delete', 'AdminController@destroyPost');
Route::get('admin/posts', 'AdminController@posts');
Route::get('admin/{id}/delete', 'AdminController@destroy');
Route::get('/Type/{id}/{type}', 'AdminController@changeType');