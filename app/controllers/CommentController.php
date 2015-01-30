<?php

use Ep\Comments\PublishCommentCommand;

class CommentController  extends BaseController {



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::only('reply-content','postId','userId');
		$command = new PublishCommentCommand($data['reply-content'], $data['postId'], $data['userId']);
		$this->commandBus->execute($command);

		return Redirect::route('getFeed');
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('users.edit');
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

}
