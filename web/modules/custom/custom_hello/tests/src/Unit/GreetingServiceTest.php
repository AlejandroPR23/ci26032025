<?php

namespace Drupal\Tests\custom_hello\Unit;

use Drupal\custom_hello\Service\GreetingService;
use PHPUnit\Framework\TestCase;

/**
 * Greeting Service Test class.
 */
class GreetingServiceTest extends TestCase {

  /**
   * Test greeting function.
   */
  public function testGetGreeting() {
    $service = new GreetingService();
    $this->assertEquals('¡Hola, Juan!', $service->getGreeting('Juan'));
  }

}
