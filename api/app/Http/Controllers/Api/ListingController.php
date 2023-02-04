<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Listing;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

// Public
class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function show_public()
    {
        $listings = Listing::where('active', 'yes')->get();

        return response()->json([
            "status" => true,
            "message" => "Available properties list",
            "data" => $listings
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show_selected_public(Listing $listing)
    {
        if (is_null($listing)||$listing['active']=='no') {
            return response()->json([
                'status' => false,
                'message' => 'Property not found'
            ]);
        }

        return response()->json([
            "success" => true,
            "message" => "Property found.",
            "data" => $listing
        ]);
    }

    //User area
    public function loggedInUserSelectedListing(Request $request, Listing $listing)
    {
        $user = $request->user();
        $owner = $listing->user();
        if (is_null($listing)||$user['id']!=$owner['id']) {
            return response()->json([
                'status' => false,
                'message' => 'Property not found'
            ]);
        }

        return response()->json([
            "success" => true,
            "message" => "Property found.",
            "data" => $listing
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, Listing $listing)
    {
        $user = $request->user();
        $owner = $listing->user();

        $input = $request->all();
        $request_data = [
            'area' => $input['area'],
            'availability' => $input['availability'],
            'size' => $input['size'],
            'price' => $input['price'],
            'active' => $input['active'],
        ];
        $validator = Validator::make($request_data, [
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

        if($validator->fails()||$user['id']!=$owner['id']){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Input',
                'error' => $validator->errors()
            ]);
        }

        $listing->area = $request_data['area'];
        $listing->availability = $request_data['availability'];
        $listing->size = $request_data['size'];
        $listing->price = $request_data['price'];
        $listing->active = $request_data['active'];
        $listing->update();

        return response()->json([
            "status" => true,
            "message" => "Listing updated successfully.",
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
