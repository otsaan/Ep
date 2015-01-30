<?php

class PagesController extends \BaseController {


    function __construct()
    {
        $this->beforeFilter('auth');
    }



    public function index()
    {
        return Redirect::route('getFeed');
    }




}