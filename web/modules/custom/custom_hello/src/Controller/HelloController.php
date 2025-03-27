<?php

namespace Drupal\custom_hello\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class for hello controller.
 */
class HelloController extends ControllerBase {

  /**
   * Function of content.
   */
  public function content() {
    return [
      '#markup' => $this->t('¡Hola desde el módulo Custom Hello!'),
    ];
  }

}
