<?php
require __DIR__ . "/../vendor/autoload.php";

use Source\Models\User;
use Source\Models\Address;

//LIÇÃO DE CASA
$user = (new User())->findById(1);
$user->first_name = "Reinaldo Azevedo";
$user->last_name = "Dorti";
$user->save();

$addr = (new Address())->findById(1);
$addr->add($user, "Votuporanga", "99");

$addr->save();