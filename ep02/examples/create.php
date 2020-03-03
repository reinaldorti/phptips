<?php
require __DIR__ . "/../vendor/autoload.php";

use Source\Models\User;
use Source\Models\Address;

$user = new User();
$user->first_name = "Reinaldo";
$user->last_name = "Dorti";
$user->genre = "M";
$user->Save();

$addr = new Address();
$addr->add($user, "Casa 1", "99");
$addr->save();

var_dump($user);