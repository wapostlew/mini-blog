<?php

use Illuminate\Support\Facades\Route;
// use MLL\GraphQLPlayground\GraphQLPlaygroundController;

// Route::get('/playground', [GraphQLPlaygroundController::class, 'index']);
Route::view('/playground', 'vendor.graphql-playground.index');
