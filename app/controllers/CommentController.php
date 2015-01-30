<?php

use Ep\Comments\PublishCommentCommand;
use Ep\Forms\PublishCommentForm;
use Laracasts\Commander\DefaultCommandBus;

class CommentController  extends BaseController {

	protected $publishCommentForm;

	function __construct(PublishCommentForm $publishCommentForm, DefaultCommandBus $commandBus)
	{
		parent::__construct($commandBus);
		$this->publishCommentForm = $publishCommentForm;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('reply-content','postId','userId');

		$this->publishCommentForm->validate($input);

		$command = new PublishCommentCommand($input['reply-content'], $input['postId'], $input['userId']);
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
