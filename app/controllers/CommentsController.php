<?php

use Ep\Comments\PublishCommentCommand;
use Ep\Forms\PublishCommentForm;
use Laracasts\Commander\DefaultCommandBus;

class CommentsController  extends BaseController {

	protected $publishCommentForm;

	function __construct(PublishCommentForm $publishCommentForm, DefaultCommandBus $commandBus)
	{
		parent::__construct($commandBus);
		$this->publishCommentForm = $publishCommentForm;
	}

	/**
	 * Store a new comment by post id.
	 *
	 * @return Response
	 */
	public function store($postId)
	{
		// TODO: validate $postId
		$input = Input::only('reply-content');

		$this->publishCommentForm->validate($input);

		$command = new PublishCommentCommand($input['reply-content'], $postId, Auth::id());
		$this->commandBus->execute($command);

		return Redirect::back();
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function like()
    {
        if (Request::ajax()) {
            $id = Input::get('id');
            $comment = Comment::findOrFail($id);
            if (!$comment->liked()) {
                $comment->like();
                return Response::json(array(
                    'success' => true,
                    'status' => 'OK',
                    'like' => true
                ));
            } else {
                $comment->unlike();
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
