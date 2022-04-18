<?php

namespace App\Tools;

use Illuminate\Support\Facades\Blade;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Twig\Extension\DebugExtension;

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
   * @param bool $is_debug
   *   Whether to enable debug mode.
   *
   * @return array
   *   Operation result.
   */
  public function renderItem($name, $is_debug = FALSE) {
    $iterations = 999;
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
    for ($i = 0; $i < $iterations; $i++) {
      Blade::compileString($data['blade']['tpl']);
    }
    $data['blade']['compile_ms'] = round((microtime(TRUE) - $time) * 1000, 2);
    $time = microtime(TRUE);
    for ($i = 0; $i < $iterations; $i++) {
      Blade::render($data['blade']['php']);
    }
    $data['blade']['render_ms'] = round((microtime(TRUE) - $time) * 1000, 2);
    $data['blade']['perf_total'] = $data['blade']['compile_ms'] + $data['blade']['render_ms'];

    // Twig.
    $twig_path = base_path() . '/resources/views/twig';
    $twig_name = $name . '.html.twig';
    $tpl_path = $twig_path . '/' . $twig_name;
    $data['twig']['tpl'] = file_get_contents($tpl_path);
    $loader = new FilesystemLoader($twig_path);
    $env = new Environment($loader);
    if ($is_debug) {
      $env->enableDebug();
      $env->addExtension(new DebugExtension());
    }
    $src = $env->getLoader()->getSourceContext($twig_name);
    $data['twig']['php'] = $env->compileSource($src);
    $data['twig']['html'] = $env->render($twig_name);
    $time = microtime(TRUE);
    for ($i = 0; $i < $iterations; $i++) {
      $env->compileSource($src);
    }
    $data['twig']['compile_ms'] = round((microtime(TRUE) - $time) * 1000, 2);
    $time = microtime(TRUE);
    for ($i = 0; $i < $iterations; $i++) {
      $env->render($twig_name);
    }
    $data['twig']['render_ms'] = round((microtime(TRUE) - $time) * 1000, 2);
    $data['twig']['perf_total'] = $data['twig']['compile_ms'] + $data['twig']['render_ms'];

    // Get delta.
    $best = min($data['twig']['perf_total'], $data['blade']['perf_total']);
    $data['twig']['perf_delta'] = round($best / $data['twig']['perf_total'], 1);
    $data['blade']['perf_delta'] = round($best / $data['blade']['perf_total'], 1);

    return $data;
  }

}
