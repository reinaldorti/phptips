<?php

require __DIR__ . "/vendor/autoload.php";

$upload = new \CoffeeCode\Uploader\Media("storege", "files");
$files = $_FILES;

if (!empty($files["file"])) {
    $file = $files["file"];

    if (empty($file["type"]) || !in_array($file["type"], $upload::isAllowed())) {
        echo "<p>Selecione um mídia válida!</p>";
    } else {
        $uploaded = $upload->upload($file, pathinfo($file["name"], PATHINFO_FILENAME), 350);
        echo "<a target='_blank' href='{$uploaded}'>Acessar Arquivo</a>";
    }
}

$sended = filter_input(INPUT_GET, "sended", FILTER_VALIDATE_BOOLEAN);
if ($sended && empty($files["file"])) {
    echo "<p>Selecione uma imagme de até " . ini_get("upload_max_filesize") . "!</p>";
}
?>

<form action="?sended=true" method="post" enctype="multipart/form-data">
    <h1>Send Mídia</h1>
    <input type="file" name="file"/>
    <button>Enviar</button>
</form>