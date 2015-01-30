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
		$input = Input::only('post-content', 'channelId');

		$this->publishPostForm->validate($input);

		$command = new PublishPostCommand($input['post-content'], $input['channelId'], Auth::id());
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
