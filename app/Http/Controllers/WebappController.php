<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebappController extends Controller
{
    /**
     *
     * @return response()
     */
    public function login()
    {
        return view('login');
    }  

    public function dashboard()
    {
        return view('dashboard');
    }  

        public function logout()
    {
        return view('login');
    }  
}
