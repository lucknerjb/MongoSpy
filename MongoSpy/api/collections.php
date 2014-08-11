<?php
// Load core
require_once( dirname(dirname(__FILE__)) . '/core/MongoSpy.php' );

$Spy = new \MongoSpy\MongoSpy();

$db_name = $_GET['database'];
$Spy->setDatabase($db_name);
$collections = $Spy->getCollections();


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
