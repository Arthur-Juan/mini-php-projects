<?php
include __DIR__. "/partials/header.php";
require_once __DIR__."/../app/Controller/NewsController.php";

$newsController = new NewsController();
$newsLista = $newsController->listAll();
?>



<main>
    <div class="container z-depth-5 center">
    <h1>Últimas Notícias</h1>

        <div class="row">
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="https://materializecss.com/images/sample-1.jpg">
                        <span class="card-title">Card Title</span>
                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="https://materializecss.com/images/sample-1.jpg">
                        <span class="card-title">Card Title</span>
                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="https://materializecss.com/images/sample-1.jpg">
                        <span class="card-title">Card Title</span>
                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="https://materializecss.com/images/sample-1.jpg">
                        <span class="card-title">Card Title</span>
                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                </div>
            </div>


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

    <?php if(isset($_SESSION['success'])){
        $message = $_SESSION['success'];
    } ?>

    <?php if(isset($message)): ?>
    M.toast({
        html: <?=$message ?>
    });

    <?php endif; ?>

</script>



<?php
include __DIR__. "/partials/footer.php";
?>
