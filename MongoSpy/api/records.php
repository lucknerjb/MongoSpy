<?php
// Load core
require_once( dirname(dirname(__FILE__)) . '/core/MongoSpy.php' );

$Spy = new \MongoSpy\MongoSpy();

$database = $_GET['database'];
$collection = $_GET['collection'];
$Spy->setDatabase($database);
$Spy->setCollection($collection);
// $collections = $Spy->getCollections();

$Spy->mongo->find();



// $collections = array();
// foreach($_collections as $coll => $count) {
//   $collections[] = array(
//     'name' => $coll,
//     // 'database'
//     'count' => $count
//   );
// }

echo header('Content-Type:application/json');
echo json_encode(array(
  'data' => $collections,
  'count' => sizeof($collections),
  'status' => 'OK'
));
