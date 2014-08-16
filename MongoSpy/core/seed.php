<?php

$m = new MongoClient('mongodb://localhost:27017');
$collection = $m->selectCollection('mongospy_seeds', 'users');

// Users
for($i = 0; $i < 1000; $i++) {
  $rand = rand(1, 100000);
  $user = array(
    'username' => 'joeblow' . $rand,
    'email' => 'joe@blow.' . $rand . '.com',
    'first_name' => 'Joe' . $rand,
    'last_name' => 'Blow' . $rand
  );

  $collection->insert($user);
}
