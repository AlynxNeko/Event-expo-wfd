<?php

use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\OrganizerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventMasterController;

Route::get('/', function () {
    return view('welcome');
});
// Route:resource
// Yes, you should still define routes even with Route::resource in Laravel if you need to add additional routes to a resource controller. If you don't, the routes defined by the resource method may take precedence over your supplemental routes.
//  Events Route
Route::resource('events', EventController::class);
Route::resource('organizers', OrganizerController::class);
Route::resource('eventsMaster', EventMasterController::class);
Route::resource('categories', EventCategoryController::class);
// Route::get('events/organizer', [EventController::class, 'organizer'])->name('events.organizer');

