<?php

namespace Drupal\custom_hello\Service;

use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 *
 */
class GreetingService {
  use StringTranslationTrait;

  /**
   *
   */
  public function getGreeting($name) {
    return $this->t('¡Hola, @name!', ['@name' => $name]);
  }

}
