<?php
namespace MongoSpy;

class MongoSpy {
  public function __construct($options = array()) {
    $this->data = new \stdClass;
    $this->method = null;

    // Method
    if (isset($_SERVER['REQUEST_METHOD'])) {
      $this->method = $_SERVER['REQUEST_METHOD'];
    }

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

  public function setDatabase($db_name) {
    // @TODO: Improve this by checking available DBs before selecting
    $this->database = $db_name;
    $this->mongo = $this->db->selectDB($this->database);
    return $this;
  }

  public function setCollection($collection) {
    // @TODO: Improve this by checking available DBs before selecting
    $this->_collection = $collection;
    $this->mongo->selectCollection($this->_collection);
    $this->collection = new \MongoCollection($this->mongo, $this->_collection);
    return $this;
  }

  public function getCollections() {
    $MongoCollectionObjects = $this->mongo->listCollections();
    foreach ($MongoCollectionObjects as $collection) {
        $collection = substr(strstr((string) $collection, '.'), 1);
        // $collections[$collection] = $this->mongo->selectCollection($collection)->count();
        $collections[] = array(
          'name' => $collection,
          'database' => $this->database,
          'count' => $this->mongo->selectCollection($collection)->count()
        );
    }
    ksort($collections);
    return $collections;
  }
}
