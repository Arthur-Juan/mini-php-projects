<?php
require_once __DIR__."/../../vendor/autoload.php";
require_once __DIR__."/../../app/Services/SessionService.php";
use App\Services\SessionService;

$login = SessionService::requireLogout();

?>
<!doctype html>
    <html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nilo Journal</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>


<nav>
    <div class="nav-wrapper blue darken-4">
        <a href="/" class="brand-logo"><img src="../../storage/images/logo/news.png" style="max-height: 70px; margin-left: 10px;" alt=""></a>
        <div href="#" class="brand-logo center">Nilo News</div>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="/">Home</a></li>
            <li><a href="/news/cadastrar">Cadastrar noticia</a></li>

            <?php if ($login): ?>
            <li><a href="/login">Login</a></li>
            <?php else: ?>
                <li><a href="/news/my">Minhas notícias</a></li>
                <li><a href="/logout">Logout</a></li>

            <?php endif ?>
        </ul>
    </div>
</nav>