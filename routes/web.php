<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;

// All Listings

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => Listing::all(),
    ]);
});

// Single Listing

Route::get('/listings/{listing}', function (Listing $listing) {

    $listing = Listing::find($id);

    return view('listing', [
        'listing' => $listing,
    ]);
});
