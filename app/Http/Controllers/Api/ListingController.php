<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Listing;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Interfaces\ListingServiceInterface;
use App\Http\Requests\CreateListingRequest;

class ListingController extends Controller
{
    private $listingService;

    /**
     * ListingController constructor
     */
    public function __construct(ListingServiceInterface $listingService)
    {
        $this->listingService = $listingService;
    }
    /**
     * Display listings for logged in user
     *
     * @return JsonResponse
     */
    public function getListings(Request $request): JsonResponse
    {
        $listings = $this->listingService->getListings();

        return response()->json([
            "status" => true,
            "message" => "GET_LISTINGS",
            "data" => $listings
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateListingRequest $request)
    {

        $listing = $this->listingService->createListingForUser($request);
        
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
        $this->listingService->deleteListingOfUser($listing);

        return response()->json([
            "status" => true,
            "message" => "LISTING_DELETED",
        ]);
    }
}
