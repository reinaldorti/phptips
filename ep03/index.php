<?php

require __DIR__ . "/vendor/autoload.php";

use Source\Support\Email;

$email = new Email();

$email->add(
    "Olá Mundo! Esse é meu segundo disparo!",
    "<h1>Estou testando!</h1> Espero que tenha dado certo!",
    "Reinaldo Dorti",
    "reinaldorti@gmail.com"
)->attach(
    "files/01.jpg",
    "FSPHP"
)->attach(
    "files/02.jpg",
    "LARADEV"
)->send();

if (!$email->error()) {
    var_dump(true);
} else {
    echo $email->error()->getMessage();
}
