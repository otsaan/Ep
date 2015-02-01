<?php

use Ep\Forms\PublishPostForm;
use Ep\Posts\PublishPostCommand;
use Laracasts\Commander\DefaultCommandBus;

class PostsController extends BaseController {

	protected $publishPostForm;

	function __construct(PublishPostForm $publishPostForm, DefaultCommandBus $commandBus)
	{
		parent::__construct($commandBus);
		$this->publishPostForm = $publishPostForm;
	}


	/**
	 * Display all posts by channel id
	 * GET channels/{channelId}/posts/
	 * @return Response
	 */
	public function index($channelId)
	{
        $userId = Auth::id();
        $posts = Channel::findOrFail($channelId)->posts()->orderBy('created_at','desc')->get();
        $notifications=Notifynder::getNotRead(Auth::user()->id);
        return View::make('posts.index', compact('posts', 'userId', 'channelId','notifications'));
	}


	/**
	 * Display all existing posts on the database
	 * IN ALL CHANNELS !!
	 * GET channels/posts/
	 * @return Response
	 */
	public function all()
	{
        $posts = Post::with('comments.user')->orderBy('created_at', 'desc')->paginate(10);
        $notifications=Notifynder::getNotRead(Auth::user()->id);

        return View::make('posts.all', compact('posts','notifications'));
	}

	/**
	 * Store a newly created post whithin a channel
	 * POST channels/{channelId}/posts/
	 * @return Response
	 */
	public function store($channelId)
	{
		$input = Input::only('post-content');

		$this->publishPostForm->validate($input);

		$command = new PublishPostCommand($input['post-content'], $channelId, Auth::id());
		$this->commandBus->execute($command);

		return Redirect::back();
	}

	/**
	 * Show single post
	 * GET channels/{channels}/posts/{posts}
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return "nothing here from PostsController@show";
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return "nothing here from PostsController@edit";
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return "nothing here from PostsController@update";
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return "nothing here from PostsController@destroy";
	}


    public function like()
    {
        if (Request::ajax()) {
            $id = Input::get('id');
            $post = Post::findOrFail($id);
            if (!$post->liked()) {
                $post->like();
                return Response::json(array(
                    'success' => true,
                    'status' => 'OK',
                    'like' => true
                ));
            } else {
                $post->unlike();
                return Response::json(array(
                    'success' => true,
                    'status' => 'OK',
                    'like' => false
                ));
            }
        }
        return App::abort(403);

    }


}
