<?php

require_once APP_ROOT . '/classes/Controller.php';
require_once APP_ROOT . '/Controller/ListController.php';
require_once APP_ROOT . '/Controller/DetailController.php';
require_once APP_ROOT . '/Controller/NewController.php';

/**
 * App Controller delegates the responsible view controller
 */
class Guestbook extends Controller {

  public function __construct() {
    parent::__construct();
  }

  /**
   * Execute the responsible Controller
   */
  public function execute() {
    $viewController = $this->getViewController();
    if ($viewController instanceof Controller) {
      $viewController->execute();
    } else {
      echo "404!";
    }
  }

}
