<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('start');
});

Route::get('/blade/variable-assign', function () {
  return view('start', ['time' => 230]);
});
