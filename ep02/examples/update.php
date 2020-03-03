<?php
require __DIR__ . "/../vendor/autoload.php";

use Source\Models\User;

$user = (new User())->findById(1);

$user->first_name = "Reinaldo";
$user->last_name = "Dorti";

$user->save();

var_dump($user);