<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index(){
        return view('app');
    }
}
