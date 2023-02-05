<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Listing;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getListings(Request $request){
        $listings = $request->user()->userListings();
        return $listings;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $user = $request->user();
        $request_data = [
            'user_id'=> $user['id'],
            'area' => $input['area'],
            'availability' => $input['availability'],
            'size' => $input['size'],
            'price' => $input['price'],
            'active' => $input['active'],
        ];

        $validator = Validator::make($request_data, [
            'user_id'=> 'required',
            'area'=> ['required', 
                     Rule::in(['Αθήνα', 'Θεσσαλονίκη', 'Πάτρα', 'Ηράκλειο']),
                    ],
            'availability'=> ['required', 
                             Rule::in(['ενοικίαση', 'πώληση']),
                            ],
            'size'=> 'required|integer|between:20,1000',
            'price'=> 'required|integer|between:50,5000000',
            'active'=> ['required', 
                        Rule::in(['yes', 'no']),
                        ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Input',
                'error' => $validator->errors()
            ]);
        }

        $listing = Listing::create($request_data);

        return response()->json([
            "status" => true,
            "message" => "Listing stored successfully.",
            "data" => $listing
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(Request $request, Listing $listing)
    {
        $user = $request->user();
        $owner = $listing->user();

        if($user['id']!=$owner['id']){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Action',
            ]);
        }

        $listing->delete();
        return response()->json([
            "status" => true,
            "message" => "Listing deleted successfully.",
            "data" => $listing
        ]);
    }
}
