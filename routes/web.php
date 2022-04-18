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

// 5. Security.
Route::get('/security', function () {
  $renderer = new Renderer();
  $data = $renderer->renderItem('security');
  $data['title'] = '5. Security.';
  return view('test-container', $data);
});

// 6. Stability.
Route::get('/stability', function () {
  $renderer = new Renderer();
  $data = $renderer->renderItem('stability');
  $data['title'] = '6. Stability.';
  return view('test-container', $data);
});

// 7. Context.
Route::get('/context', function () {
  $renderer = new Renderer();
  $data = $renderer->renderItem('context', TRUE);
  $data['title'] = '7. Context.';
  return view('test-container', $data);
});

// 8. Extendability.
Route::get('/extendability', function () {
  $renderer = new Renderer();
  $data = $renderer->renderItem('extendability', TRUE);
  $data['title'] = '8. Extendability.';
  return view('test-container', $data);
});
