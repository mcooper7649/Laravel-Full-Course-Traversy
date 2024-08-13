<?php

use Illuminate\Support\Facades\Route;

// Define a route that returns a list of posts in JSON format
Route::get('/posts', function () {
    return response()->json([
        'posts' => [
            [
                'title' => 'Post One',
                // Additional fields can be added here
            ],
        ],
    ]);
});
