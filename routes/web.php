<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

// All Listings

Route::get('/', [ListingController::class, 'index']);

// Show Create Form

Route::get('/listings/create', [ListingController::class, 'create']);

// Store Listing Data

Route::post('/listings', [ListingController::class, 'store']);

// Show Edit form

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update Listing

Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete Listing

Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// Show Register/Create Form

Route::get('/register', [UserController::class, 'create']);

// Single Listing

Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Create New User

Route::post('/users', [UserController::class, 'store']);

// Log User Out

Route::post('/logout', [UserController::class, 'logout']);

// Show Login Form

Route::get('/login', [UserController::class, 'login']);

// Log In User

Route::post('/users/authenticate', [UserController::class, 'authenticate']);
