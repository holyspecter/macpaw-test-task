<?php

require __DIR__.'/vendor/autoload.php';

// var_dump(class_exists('App\Entity\AbstractAirplane'));

// var_dump(new \App\Entity\AeropraktA24());
// var_dump(new \App\Entity\CurtissNC24());

$x = new \App\Entity\Boeing747();
$x->landOnRunway();
// var_dump();