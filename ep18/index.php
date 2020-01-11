<?php
require __DIR__ . "/vendor/autoload.php";

$userCreate = false;
if ($userCreate) {
    $user = new \Source\Models\User();
    $user->first_name = "Reinaldo";
    $user->last_name = "Dorti";
    $user->email = "reinaldorti@gmail.com";
    $user->password = password_hash("12345", PASSWORD_DEFAULT);

    if ($user->save()) {
        echo "<h1>Usuário cadastrado: {$user->id}</h1>";
    } else {
        echo "<h2>{$user->fail()->getMessage()}</h2>";
    }
}

/*
 * LOAD USER
 */
echo "<h1>User:</h1>";
$user = (new \Source\Models\User())->findById(2);

var_dump($user->data());

/*
 * LOGIN EXEMPLO
 */

$email = "reinaldorti@gmail.com";
$pass = "12345";

$login = (new \Source\Models\User())->find("email = :e", "e={$email}")->fetch();

if (!$login || !password_verify($pass, $login->password)) {
    echo "<h2>E-mail ou senha não conferem!</h2>";
} else {
    echo "<h2>Login efetuado!</h2>";
}

var_dump($login->data());

/*
 * TEST HASH
 */
echo "<h1>INFO AND IF REHASH</h1>";

var_dump(
    password_get_info($user->password),
    password_needs_rehash($user->password, PASSWORD_DEFAULT),
    password_needs_rehash($user->password, PASSWORD_DEFAULT, ["cost" => 8])
);

$user->password = password_hash($pass, PASSWORD_DEFAULT, ["cost" => 8]);
$user->password = password_hash($pass, PASSWORD_DEFAULT);
$user->save();