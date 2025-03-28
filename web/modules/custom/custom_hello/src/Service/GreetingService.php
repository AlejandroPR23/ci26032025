<?php

namespace Drupal\custom_hello\Service;

/**
 * Greetin class Service.
 */
class GreetingService {

  /**
   * Get greeting function.
   */
  public function getGreeting($name) {
    // Retorna directamente la cadena sin traducción.
    return "¡Hola, $name!";
  }

}
