<?php

require __DIR__ . "/vendor/autoload.php";

$user = new \Source\Models\User();
//$user = (new \Source\Models\User())->findById(3);
$user->first_name = "Reinaldo";
$user->last_name = "Dorti";
$user->email = "reinaldorti@hotmail.com";
$user->password = "123";

if (!$user->save()) {
    echo "<h3>{$user->fail()->getMessage()}</h3>";
}

echo "<h2>Usuário</h2>";
var_dump($user->data());

