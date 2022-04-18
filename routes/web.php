<?php

use Illuminate\Support\Facades\Route;
use App\Tools\Renderer;

Route::get('/', function () {
    return view('start');
});

// 1. Create and write simple and complex variables.
Route::get('/variable-assign', function () {
  $renderer = new Renderer();
  $data = $renderer->renderItem('var-assign');
  $data['title'] = '1. Create and write simple and complex variables.';
  return view('test-container', $data);
});

// 2. Rendering logic.
Route::get('/logic', function () {
  $renderer = new Renderer();
  $data = $renderer->renderItem('logic');
  $data['title'] = '2. Flexible rendering logic.';
  return view('test-container', $data);
});

// 3. Control structures.
Route::get('/control', function () {
  $renderer = new Renderer();
  $data = $renderer->renderItem('control');
  $data['title'] = '3. Flexible control structures.';
  return view('test-container', $data);
});

// 4. Vertical and horizontal inheritance.
Route::get('/inheritance', function () {
  $renderer = new Renderer();
  $data = $renderer->renderItem('inheritance');
  $data['title'] = '4. Vertical and horizontal inheritance.';
  return view('test-container', $data);
});


