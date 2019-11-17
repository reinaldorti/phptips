<?php
require __DIR__ . "/../vendor/autoload.php";


use Source\Models\User;


$user = (new User())->findById(3);

$user->first_name = "Vanessa Cristina";
$user->last_name = "Peres";

$user->save();


var_dump($user);



