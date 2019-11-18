<?php

require __DIR__ . "/vendor/autoload.php";

use Faker\Provider\Image;
use Faker\Provider\Lorem;
use Source\Models\Post;

for ($i = 0; $i < 30; $i++) {
    $post = new Post();
    $post->title = Lorem::text(80);
    $post->cover = Image::image("images", 300, 150);
    $post->description = Lorem::paragraphs(2, true);
    $post->save();
}