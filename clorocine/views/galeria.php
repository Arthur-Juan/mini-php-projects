<?php
//session_start();
include 'header.php';

?>


<?php

require_once "./app/controllers/FilmesController.php";
require "./util/message.php";

$filmeController = new FilmesController();
$filmes = $filmeController->index();

?>
<body>


<nav class="nav-extended purple lighten-1">
    <div class="nav-wrapper">

        <a href="#" class="brand-logo center">CLOROCINE</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right">
            <li class="active"><a href="/">Galeria</a></li>
            <li><a href="/novo">Cadastrar</a></li>
        </ul>
    </div>
    <div class="nav-content">
        <ul class="tabs tabs-transparent purple darken-1">
            <li class="tab"><a class="active" href="#test1">Todos</a></li>
            <li class="tab"><a href="#test3">Favoritos</a></li>
        </ul>
    </div>
</nav>

<div class="">
    <div class="row">

        <?php foreach ($filmes as $filme): ?>
            <div class="col s12 m6 l3">
                <div class="card hoverable" style="width: 300px; height: 650px;">
                    <div class="card-image">
                        <img src="<?= $filme->poster ?>">
                        <span class="card-title"><?= $filme->title ?></span>

                        <div style="display: flex; justify-content: space-between;">


                            <button data-id="<?= $filme->id ?>"
                                    class="btn-fav btn-floating halfway-fab waves-effect waves-light red">
                                <i class="material-icons"><?= ($filme->favorite) ? "favorite" : "favorite_border" ?></i>
                            </button>

                        </div>
                    </div>
                    <div class="card-content">
                        <p class="valign-wrapper">
                            <i class="material-icons amber-text">star</i> <?= $filme->nota ?>
                        </p>
                        <p><?= $filme->sinopse ?></p>

                    <button data-id="<?= $filme->id ?>"
                            class="btn-del btn-floating halfway-fab waves-effect waves-light red">
                        <i class="material-icons">delete</i>
                    </button>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>


    </div>
</div>


<script>

    let elBtn = document.querySelectorAll(".btn-fav");
    elBtn.forEach((btn) => {
        btn.addEventListener("click", (event) => {

            const id = btn.getAttribute('data-id');

            let elIcon = btn.querySelector("i");

            fetch(`/favoritar/${id}`)
                .then(response => response.json())
                .then(response => {
                    if (response.success === true) {

                        if (elIcon.innerHTML === "favorite") {
                            elIcon.innerHTML = "favorite_border";
                        } else {
                            elIcon.innerHTML = "favorite";
                        }

                    }
                })
                .catch(error => {
                    M.toast({
                        html: 'Erro ao favoritar'
                    })
                })
            ;


        });
    });

    //APAGAR

    let elBtnDel = document.querySelectorAll(".btn-del");
    elBtnDel.forEach((btn) => {
        btn.addEventListener("click", (event) => {

            const id = btn.getAttribute('data-id');

            const config = { method: "DELETE", headets: new Headers() }

            fetch(`/filmes/${id}`, config)
                .then(response => response.json())
                .then(response => {
                    if (response.success === true) {
                        window.location.reload();
                    }
                })
                .catch( error => {
                    M.toast({
                        html:"Erro ao apagar o filme"
                    })
                } )
        });
    });


</script>


</body>

