<?php

namespace App\Tools;

use Illuminate\Support\Facades\Blade;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use App\Twig\CustomTwigExtension;

/**
 * Performance tool.
 */
class PerfRenderer {

  /**
   * Performs a comprehensive performance test.
   *
   * @return array
   *   Operation result.
   */
  public function getPerf() {
    $iterations = 100;
    $names = [
      'control',
      'extendability',
      'inheritance',
      'logic',
      'security',
      'stability',
      'var-assign',
    ];
    $data = [
      'blade' => [
        'ms' => 0,
      ],
      'twig' => [
        'ms' => 0,
      ],
    ];

    // The main loop.
    foreach ($names as $name) {

      // Blade.
      $time = microtime(TRUE);
      $tpl_path = base_path() . '/resources/views/blade/' . $name . '.blade.php';
      $tpl = file_get_contents($tpl_path);
      for ($i = 0; $i < $iterations; $i++) {
        $php = Blade::compileString($tpl);
        Blade::render($php);
      }
      $data['blade']['ms'] += microtime(TRUE) - $time;

      // Twig.
      $time = microtime(TRUE);
      $twig_path = base_path() . '/resources/views/twig';
      $twig_name = $name . '.html.twig';
      $loader = new FilesystemLoader($twig_path);
      $env = new Environment($loader);
      $env->addExtension(new CustomTwigExtension());
      $src = $env->getLoader()->getSourceContext($twig_name);
      for ($i = 0; $i < $iterations; $i++) {
        $env->compileSource($src);
        $env->render($twig_name);
      }
      $data['twig']['ms'] += microtime(TRUE) - $time;
    }

    // Get delta.
    $data['blade']['ms'] = round(($data['blade']['ms']) * 1000, 2);
    $data['twig']['ms'] = round(($data['twig']['ms']) * 1000, 2);
    $best = min($data['twig']['ms'], $data['blade']['ms']);
    $data['twig']['delta'] = round($best / $data['twig']['ms'], 1);
    $data['blade']['delta'] = round($best / $data['blade']['ms'], 1);

    return $data;
  }

}
