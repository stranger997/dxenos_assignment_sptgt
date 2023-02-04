<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loggedInUserListings(Request $request){
        return $request->user()->userListings();
    }
}
