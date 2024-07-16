<?php

use App\Http\Controllers\{SignupController, ClientRequestController};
use App\Livewire\{About,Contact,Details,Index,Properties,Services};
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class);

Route::get('/about', About::class)->name('about');

Route::get('/services', Services::class)->name('services');

Route::get('/properties', Properties::class)->name('properties');

Route::get('/contact', Contact::class)->name('contact');

Route::get('/detail/{slug}', Details::class)->name('detail/{slug}');

Route::get('signup', [SignupController::class, 'index'])->name('agent.index');

Route::post('signup', [SignupController::class, 'create'])->name('agent.register');

Route::get('search', [SearchController::class, 'search']);

Route::get('/property/request/{slug}', [ClientRequestController::class, 'index']);
Route::post('/property/request', [ClientRequestController::class, 'store'])->name('client.request');

Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.request');

Route::get('/storageLink', static function(){
    Artisan::call("storage:link");
});
