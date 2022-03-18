<?php
include __DIR__ . "/partials/header.php";
require_once __DIR__ . "/../app/Controller/NewsController.php";

$newsController = new NewsController();
$newsLista = $newsController->listMy();
?>


<main>
    <div class="row">
        <div class="container z-depth-5 center">
            <h1>Minhas Notícias</h1>
            <?php foreach ($newsLista as $news): ?>

                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= $news->poster ?>">
                            <span class="card-title"><?= $news->title ?></span>
                            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                        </div>
                        <div class="card-content">
                            <p><?= $news->subtitle ?></p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    </div>


</main>
<script>

    <?php if (isset($_SESSION['success'])) {
        $message = $_SESSION['success'];
    } ?>

    <?php if(isset($message)): ?>
    M.toast({
        html: <?=$message ?>
    });

    <?php endif; ?>

</script>


<?php
include __DIR__ . "/partials/footer.php";
?>
