<?php

use Ep\Forms\PublishPostForm;
use Ep\Posts\PublishPostCommand;
use Laracasts\Commander\DefaultCommandBus;

class PostsController extends BaseController
{

    protected $publishPostForm;

    function __construct(PublishPostForm $publishPostForm, DefaultCommandBus $commandBus)
    {
        parent::__construct($commandBus);
        $this->publishPostForm = $publishPostForm;
    }


    /**
     * TODO: restrict from professor to access channel which he does not belong
     * Display all posts by channel id
     * GET channels/{channelId}/posts/
     * @return Response
     */
    public function index($channelId)
    {

        $notifId = Input::get('notifId');

        if ($notifId) {

            try {

                Notifynder::readOne($notifId);

            } catch (Fenos\Notifynder\Exceptions\NotificationNotFoundException $e) {

                return Redirect::back();

            }
        }

        $userId = Auth::id();
        if (Auth::user()->is_type == "Professor") {
            $posts = Channel::findOrFail($channelId)->posts()->where('user_id', '=', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $posts = Channel::findOrFail($channelId)->posts()->orderBy('created_at', 'desc')->paginate(30);
        }

        $notifications = Notifynder::getNotRead(Auth::user()->id);


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
        $posts = Post::with('comments.user')->orderBy('created_at', 'desc')->paginate(30);


        return View::make('posts.all', compact('posts'));
    }

    /**
     * Store a newly created post whithin a channel
     * POST channels/{channelId}/posts/
     * @return Response
     */
    public function store($channelId)
    {
        // $input = Input::only('post-content');
        $input = Input::all();
        // $hidinput = Input::
        // $this->publishPostForm->validate($input);

        // $command = new PublishPostCommand($input['post-content'], $channelId, Auth::id());
        // $this->commandBus->execute($command);

        
        $post = new Post;
        $post->content = $input['post-content'];
        $post->channel_id = $channelId;
        $post->user_id = Auth::id();
        $post->save();

       
        if (isset($input['nbfiles']))
        {
            $files = DB::table('attachments')->orderBy('id', 'desc')->take($input['nbfiles'])->get();
            foreach ($files as $file) {
                $att = Attachment::find($file->id);
                $post->attachments()->save($att);
            }
        }
        return Redirect::back();
    }

    /**
     * Show single post
     * GET channels/{channels}/posts/{posts}
     * @param  int $id
     * @return Response
     */
    public function show($channelID, $postID)
    {
        //TODO
        /*
         * verify that the user has access to the post
         * validate the input
         */

        $notifId = Input::get('notifId');

        if ($notifId) {

            try {

                Notifynder::readOne($notifId);

            } catch (Fenos\Notifynder\Exceptions\NotificationNotFoundException $e) {

                return Redirect::back();

            }
        }
        $notifications = Notifynder::getNotRead(Auth::user()->id);
        $post = Post::findOrFail($postID);


        return View::make('posts.singlePost', compact('post','notifications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        return "nothing here from PostsController@edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        return "nothing here from PostsController@update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
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

    public function upload()
    {
            // Grab our files input
        $files = Input::file('files');
        // We will store our uploads in public/uploads/basic
        $assetPath = 'uploads';
        $uploadPath = public_path($assetPath);
        // We need an empty array for us to put the files back into
        $results = array();

        foreach ($files as $file) {
            // store our uploaded file in our uploads folder
            $name = str_replace(' ', '_', $file->getClientOriginalName());
            $filename = date('Y-m-d-H.i.s')."-".$name;
            $file->move($uploadPath, $filename);
            // set our results to have our asset path
            $name = $assetPath . '/' . $filename;
            $results[] = compact('name');

            $att = new Attachment;
            $att->path = $name;
            $att->file_type = $file->getClientOriginalExtension();
            $att->save();
        }

        // return our results in a files object
        return array(
            'files' => $results
        );
    }


}
