<?php
ob_start();
session_start();
require __DIR__ . "/vendor/autoload.php";

if (empty($_SESSION['userLogin'])) {
    echo "<h1>Guest User</h1>";

    /*
     * AUTH GOOGLE
     */

    $google = new \League\OAuth2\Client\Provider\Google(GOOGLE);
    $authUrl = $google->getAuthorizationUrl();
    $error = filter_input(INPUT_GET, "error", FILTER_SANITIZE_STRIPPED);
    $code = filter_input(INPUT_GET, "code", FILTER_SANITIZE_STRIPPED);

    if ($error) {
        echo "<h3>Você precisa autorizar para contínuar!</h3>";
    }

    if ($code) {
        $token = $google->getAccessToken("authorization_code", [
            "code" => $code
        ]);

        $_SESSION['userLogin'] = serialize($google->getResourceOwner($token));
        header("Location: " . GOOGLE["redirectUri"]);
        exit;
    }
    echo "<a href='{$authUrl}'>Google Login</a>";
} else {
    echo "<h1>User</h1>";
    /** @var League\OAuth2\Client\Provider\GoogleUser $user */
    $user = unserialize($_SESSION['userLogin']);

    echo "<img width='120' src='{$user->getAvatar()}' alt='{$user->getName()}' title='{$user->getName()}' /> <h1>Bem-vindo(a) {$user->getName()}</h1>";
    var_dump($user->toArray());

    echo "<a title='Sair' href='?off-true'>Sair</a>";
    $off = filter_input(INPUT_GET, "off", FILTER_VALIDATE_BOOLEAN);
    if ($off) {
        unset($_SESSION['userLogin']);
        header("Location: " . GOOGLE["redirectUri"]);
        exit;
    }
}

ob_end_flush();