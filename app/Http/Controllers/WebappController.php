<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Api\AuthController;
use App\Models\User;

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

    public function userLogin(Request $request)
    {
    
        $response = Http::post(env('API') . '/login' , [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]); 

        if($response->ok()) {
           session()->put('token', $response->json('access_token'));
           session()->put('user', $response->json('user'));
           return redirect('/dashboard');
        }
        return view('login');
    }  

    public function dashboard()
    {
        return view('dashboard');
    }  

        public function logout(Request $request)
    {
        $response = Http::withHeaders(["Authorization" => "Bearer ".session()->get('token')])->post(env('API') . '/logout');
        session()-> flush(); 
        return view('login');
    }  
}
