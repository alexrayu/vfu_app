<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;

Route::get('/', function () {
    return view('start');
});

Route::get('/blade/variable-assign', function () {
  $tpl_path = base_path() . '/resources/views/blade/var-assign.blade.php';
  $code = file_get_contents($tpl_path);
  $php = Blade::compileString($code);
  return view('test-container', [
    'title' => 'Title.',
    'code_tpl' => $code,
    'code_php' => $php,
    'stats' => $tpl_path,
  ]);
});
