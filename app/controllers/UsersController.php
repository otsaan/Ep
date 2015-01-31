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