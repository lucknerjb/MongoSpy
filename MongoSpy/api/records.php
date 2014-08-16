<?php
// Load core
require_once( dirname(dirname(__FILE__)) . '/core/MongoSpy.php' );
require_once( dirname(dirname(__FILE__)) . '/core/MongoSpy_Sanitizer.php' );

$Spy = new \MongoSpy\MongoSpy();
$Sanitizer = new \MongoSpy\MongoSpy_Sanitizer();

// Sanitize and store params
$GET = $Sanitizer::sanitize_params('GET');
$database = $GET['database'];
$collection = $GET['collection'];
$where = $GET['where'];
$limit = $GET['limit'];
$Spy->setDatabase($database);
$Spy->setCollection($collection);

// Make sure we have proper defaults
if (!$where) { $where = array(); }
if (!is_array($where)) { $where = (array)$where; }
if (!$limit || $limit <= 0) { $limit = 100; } // @TODO: Replace with config value

// @TODO: This is the code for use when the user wants case insensitive search
// if (sizeof($where) > 0) {
//   $where = array_map(function($item) {
//     return new MongoRegex("/^{$item}$/i");
//   }, $where);
// }

// Fetch a cursor of records
$records = array();
$cursor = $Spy->collection->find($where);

// Cursor options -> Set limit
$cursor->limit($limit);

// Loop over the cursor and get all the records
foreach($cursor as $c) {
  $records[] = $c;
}

// Return data
echo header('Content-Type:application/json');
echo json_encode(array(
  'data' => $records,
  'count' => sizeof($records),
  'status' => 'OK'
));
