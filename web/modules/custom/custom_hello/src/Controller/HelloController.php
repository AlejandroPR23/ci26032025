<?php

namespace Drupal\custom_hello\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class HelloController.
 *
 * Provides a Hello World message.
 */
class HelloController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function content() {
    return [
      '#markup' => '¡Hola desde el módulo Custom Hello!',
    ];
  }

}
