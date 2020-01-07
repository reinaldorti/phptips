<?php


namespace Source\Controllers;


use Source\Models\Product;

class Web extends Controllers
{
    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function home(array $data): void
    {
        echo $this->view->render("home", [
            "products" => (new Product())
                ->find()
                ->order("name")
                ->fetch(true)
        ]);
    }

    public function order(): void
    {
        if (!empty($_SESSION["cart"])) {
            var_dump($_SESSION["cart"]);
        } else {
            var_dump(false);
        }

        echo "<a href='" . $this->router->route("web.home") . "' title=''>Voltar</a>";
    }
}