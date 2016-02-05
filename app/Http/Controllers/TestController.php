<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function getLogin()
    {
        $data = [
            'email' => 'pvcnogueira@outlook.com',
            'password' => 1234
        ];
        if(Auth::attempt($data)) {
            return 'logou';
        }

        if(Auth::check()) {
            return 'logado';
        }

        return 'falhou';
    }

    public function getLogout()
    {
        Auth::logout();
    }

    public function getUser()
    {
        return Auth::user();
    }
}
