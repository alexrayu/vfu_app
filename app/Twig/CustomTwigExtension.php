<?php

namespace App\Twig;

/**
 * @file
 * Sample Twig extension.
 */

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Twig extension class.
 */
class CustomTwigExtension extends AbstractExtension {

  /**
   * Get declared functions.
   */
  public function getFunctions() {
    return [
      new TwigFunction('custom_print', [$this, 'printString']),
    ];
  }

  /**
   * Actual print function.
   */
  public function printString(string $string): string {
    return $string;
  }

}
