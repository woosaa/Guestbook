<?php

require_once APP_ROOT . '/Model/GuestbookEntry.php';
require_once APP_ROOT . '/Classes/Request.php';

/**
 * Abstract Controller with basic functions
 */
abstract class Controller {

  /**
   * Databaselink
   * @var SQLITE3 $db
   */
  protected $db;

  /**
   * Defines the default controller (ListController)
   * @var String $defaultController
   */
  protected $defaultController;

  /**
   * Holds the Request object with REQUEST_URI and Parameter
   * @var Request $request 
   */
  protected $request;

  public function __construct() {
    $this->defaultController = "List";
    $this->request = new Request();

    $this->db = new SQLite3(APP_ROOT . '/Database/guestbook.db', SQLITE3_OPEN_READWRITE);
  }

  /**
   * Controller entry point
   * @return boolean
   */
  public function execute() {
    return false;
  }

  /**
   * Returns the responsible view controller instance
   * @return Controller controller
   */
  public function getViewController() {
    $controllerName = $this->getViewName() . "Controller";
    if (class_exists($controllerName)) {
      $controller = new $controllerName();
      return $controller;
    }
  }

  /**
   * The name of the responsible view; First char uppercase
   * Else the default controllername is returned
   * @return String $controllerName
   */
  public function getViewName() {
    $view = $this->request->getParams();
    $controllerName = $this->defaultController;
    if (sizeof($view) > 0) {
      $controllerName = ucfirst($view[0]);
    }
    return $controllerName;
  }

  /**
   * Includes the responsible View
   */
  public function renderView() {
    include APP_ROOT . '/View/' . $this->getViewName() . '.html.php';
  }

  /**
   * Redirect to given url
   * @param String $url
   */
  public function redirectTo($url) {
    header("Location: $url");
    exit;
  }

}
