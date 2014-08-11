<?php
// Load core
require_once( dirname(dirname(__FILE__)) . '/core/MongoSpy.php' );

$Spy = new \MongoSpy\MongoSpy();

echo header('Content-Type:application/json');
echo json_encode(array(
  'data' => $Spy->data->databases,
  'count' => sizeof($Spy->data->databases),
  'status' => 'OK'
));
