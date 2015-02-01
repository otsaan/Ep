<?php
use Fenos\Notifynder\Facades\Notifynder;

class NotificationsController extends \BaseController
{


    function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function read()
    {
        try {

            //mark user's notifications as read
            Notifynder::readAll(Auth::user()->id);

        } catch (Fenos\Notifynder\Exceptions\NotificationNotFoundException $e) {

            return Redirect::back();

        }

        return Redirect::back();
    }


}