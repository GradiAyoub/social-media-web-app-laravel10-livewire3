<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Signup;
use App\Livewire\login;
use App\Livewire\Profile;
use App\Livewire\ChangeProfile;
use App\Livewire\CreatePost;
use App\Livewire\postC;
use App\Livewire\posts;
use App\Livewire\users;

use Illuminate\Support\Facades\Auth;




Route::middleware('auth')->group(function () {
    Route::get('/', posts::class);

    Route::get('/profile/{id}', Profile::class);
    Route::get('/changeProfile', ChangeProfile::class);
    Route::get('/post/{id}', postC::class);
    Route::get('/users', users::class);
});



Route::get('/signup', Signup::class);
Route::get('/login', login::class)->name('login');



