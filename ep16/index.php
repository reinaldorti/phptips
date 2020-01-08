<?php
require "vendor/autoload.php";
?><!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minificando CSS e JS com PHP</title>

   <link rel="stylesheet" href="assets/style.min.css">
</head>
<body>
<div class="box">
    <div class="box_content">
        <form>
            <div class="result"></div>
            <label>
                <span>Nome:</span>
                <input type="text" name="first_name"/>
            </label>

            <label>
                <span>Sobrenome:</span>
                <input type="text" name="last_name"/>
            </label>

            <button>Enviar</button>
        </form>
    </div>
</div>
</body>

<script src="assets/scripts.min.js"></script>
</html>