<?php

namespace Drupal\custom_hello\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase {
    public function content() {
        return [
            '#markup' => $this->t('¡Hola desde el módulo Custom Hello!'),
        ];
    }
}
