<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Paginator\Paginator;
use Source\Models\Post;

$post = new Post();
$page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRIPPED);

//$paginator = new Paginator("https://localhost/cursos/youtube/phptips/ep05/?page=", "Página", ["Primeira Página", "Primeira"],["Última Página", "Última"]);
$paginator = new Paginator("https://localhost/cursos/youtube/phptips/ep05/?page=");

$paginator->pager($post->find()->count(), "3", $page, 2);

$posts = $post->find()->limit(3)->offset(1)->fetch(true);

echo "<p>Página {$paginator->page()} de {$paginator->pages()}</p>";

if ($posts) {

    foreach ($posts as $post) {
        echo "<article class=''><img src='{$post->cover}'/><div><h1>{$post->title}</h1><div>{$post->description}</div></div></article>";
    }
}