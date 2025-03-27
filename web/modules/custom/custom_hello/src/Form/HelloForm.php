<?php

namespace Drupal\custom_hello\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\custom_hello\Service\GreetingService;

/**
 *
 */
class HelloForm extends FormBase {
  protected $messenger;
  protected $greetingService;

  public function __construct(MessengerInterface $messenger, GreetingService $greetingService) {
    $this->messenger = $messenger;
    $this->greetingService = $greetingService;
  }

  /**
   *
   */
  public static function create(ContainerInterface $container) {
    return new static(
          $container->get('messenger'),
          $container->get('custom_hello.greeting_service')
      );
  }

  /**
   *
   */
  public function getFormId() {
    return 'custom_hello_form';
  }

  /**
   *
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Tu Nombre'),
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Saludar'),
    ];

    return $form;
  }

  /**
   *
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('name');
    $message = $this->greetingService->getGreeting($name);
    $this->messenger->addMessage($message);
  }

}
