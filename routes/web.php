<?php

use Illuminate\Support\Facades\Route;
use App\Tools\Renderer;

Route::get('/', function () {
    return view('start');
});

Route::get('/blade/variable-assign', function () {
  $renderer = new Renderer();
  $data = $renderer->renderItem('var-assign');
  $data['title'] = '1.4.1 Variables. Assigning, Printing.';

  return view('test-container', $data);
});
