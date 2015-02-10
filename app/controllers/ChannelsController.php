<?php

class ChannelsController extends BaseController {


     function __construct()
    {

        $this->beforeFilter('auth');

    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$data= Channel::with('users','user')->where("public","=",1,"and")->where("user_id","!=",Auth::user()->id)->orderBy('id','desc')->take(100)->get();
        return $data;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return "nothing here from ChannelsController@create";
        //return View::make('channels.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        //Todo
        /*
         * validation
         */
        $channel = new Channel();
        $channel->name = Input::get('name');
        $channel->description = Input::get('description');
        $channel->public = Input::get('public');

        Auth::user()->channel()->save($channel);
        $channel->users()->attach(Auth::user());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return "nothing here from ChannelsController@show";
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return "nothing here from ChannelsController@edit";
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return "nothing here from ChannelsController@update";
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return "nothing here from ChannelsController@destroy";
	}

    public function manage()
    {
        return View::make('channels.index');
    }
    public function search()
    {
        //TODO
        /*
         * Input validation
         */
        $channelName =  Input::get('name');

        $data= Channel::where('name', 'like', "%{$channelName}%")->with('users','user')->where("public","=",1)->orderBy('id','desc')->take(100)->get();
        return $data;

    }

    public function join()
    {
        //TODO
        /*
         * verify that the channel is public
         * and the user has not already join it
         */
        $channelId = Input::get('id');

        Channel::findOrFail($channelId)->users()->attach(Auth::user());
    }

    public function userChannels()
    {
        $data= Auth::user()->channels()->with('users','user')->orderBy('id','desc')->get();
        return $data;
    }

    public function withdraw()
    {
        $channelId = Input::get('id');

        Channel::findOrFail($channelId)->users()->detach(Auth::user());

        $data= Auth::user()->channels()->with('users','user')->orderBy('id','desc')->get();
        return $data;
    }

    public function AddUser()
    {
        //dd(Input::all());
        ///get username channel
        //verify that the user belong to channel
        //verify that the user exest
        //add the new user
        //fire an event to the user
        $username = Input::get('username');
        $channelId = Input::get('channelId');

        $users = Channel::find($channelId)->users;
        $found = false;
        foreach ($users as $user) {
           // echo $user->id."   ".Auth::user()->id."<br>";
            if ($user->id == Auth::user()->id) {

                $found = true;
                break;

            }
        }


        if ($found) {
            $newUser= User::where('username', '=',$username)->firstOrFail();

            $newUser->channels()->attach($channelId);

            if ($newUser->id != \Auth::user()->id) {

                $notificationData = Notifynder::builder()->from('User', \Auth::user()->id)
                    ->to('User', $newUser->id )
                    ->category('invitation')
                    ->url("/channels/{$channelId}/posts")
                    ->extra(Channel::find($channelId)->name)
                    ->getArray();

                Notifynder::send($notificationData);
            }

            Flash::message('user has been added');
           return  Redirect::back();
        } else {

            Flash::error('there was an error');
            return Redirect::back();
        }



    }

}
