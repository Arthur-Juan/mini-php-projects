<?php
include __DIR__ . "/partials/header.php";

if (isset($_SESSION['msg'])) {
    $error = $_SESSION['msg'];
}
?>

<div class="container">
    <div class="row">
        <form class="col s12" method="post">
            <div class="row">

                <div class="input-field col s12">
                    <input id="title" name="title" type="text" class="validate">
                    <label for="title">Título</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="subtitle" type="text" name="subtitle" class="validate">
                    <label for="subtitle">Sumário</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="poster" type="text" name="poster" class="validate">
                    <label for="poster">Link da imagem</label>
                </div>
            </div>
            <div class="row">

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="content" name="content" class="materialize-textarea"></textarea>
                            <label for="content">Conteúdo</label>
                        </div>
                    </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit">Submit
                <i class="material-icons right">send</i>
            </button>

        </form>
        <?php if (isset($error)) {
            echo $error;
        } ?>
    </div>
</div>
<?php
include __DIR__ . "/partials/footer.php";
?>
