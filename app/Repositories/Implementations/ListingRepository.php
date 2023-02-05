<?php

namespace App\Repositories\Implementations;

use App\Repositories\Interfaces\ListingRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Listing;

class ListingRepository implements ListingRepositoryInterface
{
    /**
     * Store listing
     * 
     * @param Request $request
     * @return Listing
     */
    public function create(Request $request): Listing {   
        return Listing::create($request->all());
    }

    /**
     * Delete listing
     * 
     * @param Listing $listing
     * @return void
     */
    public function delete(Listing $listing): void {
        $listing->delete();
    }
}