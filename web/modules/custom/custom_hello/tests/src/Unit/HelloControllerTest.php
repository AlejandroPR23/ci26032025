<?php

namespace Drupal\Tests\custom_hello\Unit;

use Drupal\custom_hello\Controller\HelloController;
use PHPUnit\Framework\TestCase;

/**
 * Class HelloControllerTest.
 *
 * Test class for HelloController.
 */
class HelloControllerTest extends TestCase {

  /**
   * Test method.
   */
  public function testContent() {
    $controller = new HelloController();
    $response = $controller->content();

    $this->assertArrayHasKey('#markup', $response);
    $this->assertEquals('¡Hola desde el módulo Custom Hello!', $response['#markup']);
  }

}
