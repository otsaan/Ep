<?php

use Ep\Users\UserRepository;

class UsersController extends \BaseController {

	/**
     * @var UserRepository
     */
    protected $userRepository;
    /**
     * @param UserRepository $userRepository
     */
    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  $username
	 * @return mixed
	 */
	public function show($username)
	{
        if($user = $this->userRepository->findByUsername($username)) {
			return View::make('profile')->withUser($user);
        }
        return App::abort(404);
	}


	/**
	 * Edit the user picture
	 *
	 * @return Response
	 */
	public function editImg()
	{
		$image = Input::file('photo');
        if (Auth::check()) {
            $id = Auth::user()->id;
            $user = User::find($id);
        }
        $name = str_replace(' ', '_', $image->getClientOriginalName());
        $filename = date('Y-m-d-H.i.s')."-".$name;
        $user->photo = 'uploads/'.$filename;
        $user->save();
        $move = $image->move('uploads', $filename);
        if($move) {
            return Response::json(['success' => true]);
        }
        return Response::json(['success' => false]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		
       $validator = Validator::make(Input::all(),[
           'first_name'=>'required',
           'last_name'=>'required',
           'email'=>'required|email',
       ]);

        if($validator->fails())
        {
            Flash::error('Nom, Prenom, Email sont obligatoires ');
           return  Redirect::back();
        }

        $currentUser = Auth::user();

        $currentUser->first_name= Input::get('first_name');
        $currentUser->last_name= Input::get('last_name');
        $currentUser->email= Input::get('email');
        $currentUser->birthdate= Input::get('birthDate');
        $currentUser->phone= Input::get('phone');

        if(Input::get('Pass_actuel') != "" )
        {
            if(!Hash::check(Input::get('pass_actuel'),Auth::user()->password)){
                Flash::error('Le mot de passe ne matche pas');
                return  Redirect::back();
            }


            if(Input::get('pass') == "")
            {
                Flash::error('Le mot de passe est obligatoire');
                return  Redirect::back();
            }

            if(Input::get('pass') !=Input::get('pass2') )
            {
                Flash::error('Cnfirmation de mot de pass est incorrect');
                return  Redirect::back();
            }
        }

        $currentUser->password=Input::get('pass');




        $currentUser->save();

        return  Redirect::back();

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
