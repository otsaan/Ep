<?php
use Ep\Forms\SignInForm;
use Laracasts\Flash\Flash;
class SessionsController extends \BaseController {

   private $signInForm ;

    function __construct(SignInForm $signInForm)
    {
        $this->signInForm=$signInForm;
        $this->forgetBeforeFilter('',['except'=>'destroy']);
    }

    public function index(){

        return View::make('login');
    }

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
        $formData=Input::only('username','password');
        $this->signInForm->validate($formData);

        if(Auth::attempt($formData))
        {
            Flash::message('welcome back');
            return Redirect::home();
        }else{
            return Redirect::back();
        }
	}

	public function destroy()
	{

		Auth::logout();

        Flash::message('You have been logged out');

        return Redirect::home();
	}



}