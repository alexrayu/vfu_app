<?php

use Illuminate\Support\Facades\Route;
use App\Tools\Renderer;

Route::get('/', function () {
    return view('start');
});

Route::get('/blade/variable-assign', function () {
  $renderer = new Renderer();
  $data = $renderer->renderItem('var-assign');
  $data['title'] = '1 Create and write simple and complex variables.';

  return view('test-container', $data);
});
