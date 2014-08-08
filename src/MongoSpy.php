<?php
namespace MongoSpy;

class MongoSpy {
  public function __construct() {
    $this->config = require_once dirname(__FILE__) . '/config.php';
  }
}
