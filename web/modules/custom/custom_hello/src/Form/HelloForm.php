<?php

namespace Drupal\custom_hello\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\custom_hello\Service\GreetingService;

/**
 * Provides a Hello Form.
 */
class HelloForm extends FormBase {

  /**
   * The messenger service.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;

  /**
   * The greeting service.
   *
   * @var \Drupal\custom_hello\Service\GreetingService
   */
  protected $greetingService;

  /**
   * Constructs a new HelloForm object.
   *
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The messenger service.
   * @param \Drupal\custom_hello\Service\GreetingService $greetingService
   *   The greeting service.
   */
  public function __construct(MessengerInterface $messenger, GreetingService $greetingService) {
    $this->messenger = $messenger;
    $this->greetingService = $greetingService;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('messenger'),
      $container->get('custom_hello.greeting_service')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_hello_form';
  }

  /**
   * Builds the form.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
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
   * Handles form submission.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('name');
    $message = $this->greetingService->getGreeting($name);
    $this->messenger->addMessage($message);
  }

}
