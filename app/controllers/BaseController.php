<?php

use Laracasts\Commander\DefaultCommandBus;

class BaseController extends Controller {

	protected $commandBus;

	function __construct(DefaultCommandBus $commandBus)
	{
		$this->commandBus = $commandBus;
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

        //get notifications only if the user is connected
        if(Auth::user())
        {
            $notifications = Notifynder::getNotRead(Auth::user()->id);
            View::share('notifications',$notifications);
        }

	}

}
