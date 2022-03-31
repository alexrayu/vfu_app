<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

Route::get('/', function () {
    return view('start');
});

Route::get('/blade/variable-assign', function () {
  $data = [
    'title' => '1.4.1 Variables. Assigning, Printing.',
    'blade' => [],
    'twig' => [],
  ];

  // Blade.
  $time = microtime(TRUE);
  $tpl_path = base_path() . '/resources/views/blade/var-assign.blade.php';
  $data['blade']['tpl'] = file_get_contents($tpl_path);
  $data['blade']['php'] = Blade::compileString($data['blade']['tpl']);
  for ($i = 0; $i < 999; $i++) {
    Blade::compileString($data['blade']['tpl']);
  }
  $data['blade']['ms'] = (microtime(TRUE) - $time) / 1000;

  // Twig.
  $time = microtime(TRUE);
  $twig_path = base_path() . '/resources/views/twig';
  $data['twig']['tpl'] = file_get_contents($tpl_path);
  $loader = new FilesystemLoader($twig_path);
  $env = new Environment($loader);
  $src = $env->getLoader()->getSourceContext('var-assign.html.twig');
  $data['twig']['php'] = $env->compileSource($src);
  for ($i = 0; $i < 999; $i++) {
    $env->compileSource($src);
  }
  $data['twig']['ms'] = (microtime(TRUE) - $time) / 1000;

  return view('test-container', $data);
});
