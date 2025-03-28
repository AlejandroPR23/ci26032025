<?php

namespace Drupal\custom_hello\Service;

use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * GreetingService.
 */
class GreetingService {
  use StringTranslationTrait;

  /**
   * Get greeting funtion.
   */
  public function getGreeting($name) {
    return $this->t('¡Hola, @name!', ['@name' => $name]);
  }

}
