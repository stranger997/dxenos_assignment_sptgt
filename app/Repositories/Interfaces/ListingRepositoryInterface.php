<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;
use App\Models\Listing;

interface ListingRepositoryInterface
{
    public function create(Request $request): Listing;

    public function delete(Listing $listing): void;
}