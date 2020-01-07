<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP TIPS - <?= $title; ?></title>

    <link rel="stylesheet" href="<?= asset("/css/style.css"); ?>"/>
</head>
<body>

<main class="main">
    <?= $v->section("content"); ?>
</main>

<script src="<?= asset("/js/jquery.js"); ?>"></script>
<!--script src="https://code.jquery.com/jquery-3.4.1.min.js"></script-->

<?= $v->section("js"); ?>

</body>
</html>