<?php

use Ep\Forms\PublishPostForm;
use Ep\Posts\PublishPostCommand;
use Laracasts\Commander\DefaultCommandBus;

class PostController extends BaseController {

	protected $publishPostForm;

	function __construct(PublishPostForm $publishPostForm, DefaultCommandBus $commandBus)
	{
		parent::__construct($commandBus);
		$this->publishPostForm = $publishPostForm;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('post-content', 'channelId', 'userId');

		$this->publishPostForm->validate($input);

		$command = new PublishPostCommand($input['post-content'], $input['channelId'], $input['userId']);
		$this->commandBus->execute($command);

		return Redirect::route('getFeed');
	}

	/**
	 * Show single post
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        //
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        //
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
