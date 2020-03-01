<?php
require __DIR__ . "/../vendor/autoload.php";

use Source\Models\User;
use Source\Models\Address;

//MINHA LIÇÃO DE CASA

$user = (new User())->findById(1);

$addr = new Address();
$addr->add($user, "Rua: Votuporanga", "55");

$addr->save();