<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class);
Route::get('/ari-wedding/{nama}', \App\Livewire\Ari::class);
