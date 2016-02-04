<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;

class WelcomeController extends Controller
{
    public function index(){
        return view('app');
    }
}
