<?php
use Ep\Forms\RegistrationForm;
use Ep\Registration\RegisterUserCommand;
use Ep\Core\CommandBus;

class RegistrationController extends \BaseController {

    use CommandBus;

    private $registrationForm;


    function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;
        $this->beforeFilter("guest");

    }

    /**
     * Display a listing of the resource.
     * GET /registration
     *
     * @return Response
     */
    public function index()
    {
        return View::make('signup');
    }

    /**
     * Show the form for creating a new resource.
     * GET /registration/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /registration
     *
     * @return Response
     */
    public function store()
    {

        //before we do any thing we validate
        $this->registrationForm->validate(Input::all());

        extract(Input::all());

        $user = $this->execute(
            new RegisterUserCommand($is_type, $email, $first_name, $last_name, $password, $username)
        );

        Auth::login($user);

        Flash::overlay("wilcome aboard");

        return Redirect::home();

    }

    /**
     * Display the specified resource.
     * GET /registration/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /registration/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /registration/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /registration/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}