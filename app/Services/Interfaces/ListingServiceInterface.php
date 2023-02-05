<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Listing;

interface ListingServiceInterface
{
    public function getListings(): ? Collection;

    public function createListingForUser(Request $request): Listing;

    public function deleteListingOfUser(Listing $listing): void;
}