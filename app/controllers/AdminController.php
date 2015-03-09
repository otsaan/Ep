<?php

class adminController extends \BaseController {

    function __construct()
    {

        $this->beforeFilter('auth');
        /*
         * if the user is not admin
         * redirect back
         */
        if(Auth::user()->is_type != "Admin")
        {
            Redirect::back();
        }
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function users()
	{
        $q = Input::get("q");
        if($q)
        {
            $users = User::where("username","LIKE","%$q%")
                ->orWhere("last_name","LIKE","%$q%")
                ->orWhere("first_name","LIKE","%$q%")
                ->latest()
                ->paginate(15);
        }else{
            $users = User::latest()->paginate(15);
        }
		return View::make("admin.users",compact('users'));
	}

	public function groups()
	{
		$q = Input::get("q");
        if($q)
        {
            $groups = Channel::where("name","LIKE","%$q%")
                ->latest()
                ->paginate(15);
        }else{
			$groups = Channel::latest()->paginate(15);
        }
		return View::make("admin.groups",compact('groups'));
	}

	public function index()
	{
		return View::make("admin.index",compact('users'));
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
        if(User::findOrFail($id)->delete())
        {
            Flash::message("Oppération effectuée avec succèe");

        }else{

            Flash::message("Opération non effectuée ");
        }
        return Redirect::back();

	}

	public function destroyChannel($id)
	{
        if(Channel::findOrFail($id)->delete())
        {
            Flash::message("Oppération effectuée avec succèe");

        }else{

            Flash::message("Opération non effectuée ");
        }
        return Redirect::back();

	}
    public function changeType($id,$type)
    {
        //TODO validation
        $user = User::findOrFail($id);
        $user->is_type = $type;
        if($user->save())
        {
            Flash::message("Oppération effectuée avec succèe");

        }else{

            Flash::message("Opération non effectuée ");
        }
        return Redirect::back();
    }

}
