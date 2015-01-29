<?php

class PagesController extends \BaseController {


    function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function home()
    {
        return View::make('index');
    }

    /**
     * Display a listing of the resource.
     * GET /pages
     *
     * @return Response
     */
    public function index()
    {
        return View::make('index');
    }


}