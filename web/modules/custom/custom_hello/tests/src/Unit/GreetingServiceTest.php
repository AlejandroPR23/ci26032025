<?php

namespace Drupal\Tests\custom_hello\Unit;

use Drupal\custom_hello\Service\GreetingService;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class GreetingServiceTest extends TestCase {

  /**
   *
   */
  public function testGetGreeting() {
    $service = new GreetingService();
    $this->assertEquals('¡Hola, Juan!', $service->getGreeting('Juan'));
  }

}
