<?php

require dirname(dirname(__FILE__)) . '/MongoSpy.php';
$spy = new \MongoSpy\MongoSpy;
// print_r($spy->data); die;
$databases = $spy->data->databases;

// echo '<pre>';
// print_r($databases);
// die;
