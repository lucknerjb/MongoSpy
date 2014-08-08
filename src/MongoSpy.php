<?php
namespace MongoSpy;

class MongoSpy {
  public function __construct($options = array()) {
    $this->data = new \stdClass;

    // Load config
    $this->config = require_once dirname(__FILE__) . '/config.php';

    // Options
    $this->database = isset($options['database']) ? $options['database'] : 'admin'; // Default DB is admin

    // Check to see if the mongo extension is loaded
    if (!extension_loaded('mongo')) {
      throw new mongoExtensionNotInstalled();
    }

    // Try and connect
    try {
      $this->db = $this->_mongo();
      $this->mongo = $this->db->selectDB($this->database);
    } catch (MongoConnectionException $e) {
      throw new cannotConnectToMongoServer();
    }

    // Fetch DBs
    $result = $this->db->selectDB('admin')->command(array('listDatabases' => 1));
    $this->data->databases = $result['databases'];

    (object)$this->data;
  }

  protected function _mongo() {
    $conn = $this->config['mongo_connection'];
    $host = $this->config['mongo_host'];
    $port = $this->config['mongo_port'];
    $replica = $this->config['replica_set'];

    // Attempt a connection
    // @TODO: Err handle
    $connection = (!$conn) ? "mongodb://$host:$port" : $conn;

    // Create PHP client
    $mongo = (class_exists('MongoClient') === true) ? 'MongoClient' : 'Mongo';
    return (!$replica ? new $mongo($connection) : new $mongo($connection, array('replicaSet' => true)));
  }
}
