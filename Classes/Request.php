<?php

class Request {

  /**
   * Contains the value of $_SERVER['REQUEST_URI']
   * @var String $url 
   */
  private $url;

  /**
   * Splited request url into parts
   * [0] => ViewName
   * [1] => Parameter (ID)
   * @var array $params 
   */
  private $params;

  public function __construct() {
    $this->url = filter_input(INPUT_SERVER, 'REQUEST_URI');
    $this->params = preg_split('#/#', $this->url, -1, PREG_SPLIT_NO_EMPTY);
  }

  public function getUrl() {
    return $this->url;
  }

  public function getParams() {
    return $this->params;
  }

  public function setUrl($url) {
    $this->url = $url;
  }

  public function setParams($params) {
    $this->params = $params;
  }

}
