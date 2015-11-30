<?php
namespace Controller;

use Classes\Controller;
use Interfaces\ControllerInterface;

/**
 * App Controller delegates the responsible view controller
 */
class Guestbook extends Controller implements ControllerInterface  {

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
