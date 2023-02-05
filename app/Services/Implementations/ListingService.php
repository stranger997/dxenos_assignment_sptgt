<?php

namespace App\Services\Implementations;

use App\Services\Interfaces\ListingServiceInterface;
use App\Repositories\Interfaces\ListingRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Listing;

class ListingService implements ListingServiceInterface
{
    private $listingRepository;

    /**
     * ListingController constructor
     */
    public function __construct(ListingRepositoryInterface $listingRepository)
    {
        $this->listingRepository = $listingRepository;
    }

    /**
     * List of logged in listings
     * 
     * @return Collection
     */
    public function getListings(): ? Collection {
       return auth()->user()->userListings();
    }

    /**
     * Store listing
     * 
     * @param Request $request
     * @return Listing
     */
    public function createListingForUser(Request $request): Listing {
        $request->merge([
            'user_id' => auth()->user()->id
        ]);
    
        return $this->listingRepository->create($request);
    }

    /**
     * Delete listing
     * 
     * @param Listing $listing
     * @return void
     */
    public function deleteListingOfUser(Listing $listing): void {
    
        $user_id = auth()->user()->id;
        if($listing->user_id != $user_id){
            throw new \Exception('Invalid Action');
        }
        $this->listingRepository->delete($listing);
    }
}