<?php
session_start();

require __DIR__ . "/vendor/autoload.php";

$router = new \CoffeeCode\Router\Router(ROOT);
$router->namespace("Source\Controllers");

/*
 * WEB
 */
$router->group(null);
$router->get("/", "Web:home", "web.home");
$router->get("/carrinho", "Web:order", "web.order");

/*
 * CART
 */
$router->group("/cart");
$router->post("/", "WebCart:cart", "cart.cart");
$router->post("/add/{id}", "WebCart:add", "cart.add");
$router->post("/remove/{id}", "WebCart:remove", "cart.remove");
$router->post("/clear", "WebCart:clear", "cart.clear");

/*
 * PROCESS
 */
$router->dispatch();
if ($error = $router->error()) {
    var_dump($error);
}

ob_end_flush();