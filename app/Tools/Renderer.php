<?php

namespace App\Tools;

use Illuminate\Support\Facades\Blade;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

/**
 * Tester and Renderer tool.
 */
class Renderer {

  /**
   * Performs a test rendering of a single item.
   *
   * @param string $name
   *   Template name. Must be the same for Blade and Twig and reside in a
   *   corresponding folder.
   *
   * @return array
   *   Operation result.
   */
  public static function renderItem($name) {
    $data = [
      'blade' => [],
      'twig' => [],
    ];

    // Blade.
    $tpl_path = base_path() . '/resources/views/blade/' . $name . '.blade.php';
    $data['blade']['tpl'] = file_get_contents($tpl_path);
    $data['blade']['php'] = Blade::compileString($data['blade']['tpl']);
    $data['blade']['html'] = Blade::render($data['blade']['php']);
    $time = microtime(TRUE);
    for ($i = 0; $i < 999; $i++) {
      Blade::compileString($data['blade']['tpl']);
    }
    $data['blade']['compile_ms'] = round((microtime(TRUE) - $time) * 1000, 2);
    $time = microtime(TRUE);
    for ($i = 0; $i < 999; $i++) {
      Blade::render($data['blade']['php']);
    }
    $data['blade']['render_ms'] = round((microtime(TRUE) - $time) * 1000, 2);

    // Twig.
    $twig_path = base_path() . '/resources/views/twig';
    $twig_name = $name . '.html.twig';
    $data['twig']['tpl'] = file_get_contents($tpl_path);
    $loader = new FilesystemLoader($twig_path);
    $env = new Environment($loader);
    $src = $env->getLoader()->getSourceContext($twig_name);
    $data['twig']['php'] = $env->compileSource($src);
    $data['twig']['html'] = $env->render($twig_name);
    $time = microtime(TRUE);
    for ($i = 0; $i < 999; $i++) {
      $env->compileSource($src);
    }
    $data['twig']['compile_ms'] = round((microtime(TRUE) - $time) * 1000, 2);
    $time = microtime(TRUE);
    for ($i = 0; $i < 999; $i++) {
      $env->render($twig_name);
    }
    $data['twig']['render_ms'] = round((microtime(TRUE) - $time) * 1000, 2);

    return $data;
  }

}
