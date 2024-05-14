<?php

use App\Livewire\About;
use App\Livewire\Contact;
use App\Livewire\Details;
use App\Livewire\Index;
use App\Livewire\Properties;
use App\Livewire\Services;

use Illuminate\Support\Facades\Route;

Route::get('/', Index::class);

Route::get('/about', About::class)->name('about');

Route::get('/services', Services::class)->name('services');

Route::get('/properties', Properties::class)->name('properties');

Route::get('/contact', Contact::class)->name('contact');

Route::get('/detail/{slug}', Details::class)->name('detail/{slug}');
