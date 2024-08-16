<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

// All Listings

Route::get('/', [ListingController::class, 'index']);

// Show Create Form

Route::get('/listings/create', [ListingController::class, 'create']);

// Store Listing Data

Route::post('/listings', [ListingController::class, 'store']);

// Single Listing

Route::get('/listings/{listing}', [ListingController::class, 'show']);
