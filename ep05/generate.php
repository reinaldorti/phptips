<?php

require __DIR__ . "/vendor/autoload.php";

use Faker\Provider\Image;
use Faker\Provider\Lorem;
use Source\Models\Post;

//CHECK DIRECTORY
function checkDir($Dir)
{
    if (file_exists($Dir) && is_dir($Dir)):
        return true;
    else:
        return false;
    endif;
}

//CREATE PASTE IMAGES
$DirImages = "images";
if (!checkDir($DirImages)):
    mkdir($DirImages, 0777);
endif;

for ($i = 0; $i < 5; $i++) {
    $post = new Post();
    $post->title = Lorem::text(80);
    $post->cover = Image::image($DirImages, 300, 150);
    $post->description = Lorem::paragraphs(2, true);
    $post->save();
}