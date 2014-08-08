<?php
  $MongoSpy = require dirname(__FILE__) . '/src/MongoSpy.php';
  var_dump( class_exists('MongoClient') );

  $m = new MongoClient();

  print_r($m);
