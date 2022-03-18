<?php
include 'header.php';
?>
<body>


<nav class="nav-extended purple lighten-1">
    <div class="nav-wrapper">

        <a href="#" class="brand-logo center">CLOROCINE</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right">
            <li><a href="/">Galeria</a></li>
            <li class="active"><a href="/novo">Cadastrar</a></li>
        </ul>
    </div>
    <div class="nav-content">
        <ul class="tabs tabs-transparent purple darken-1">
            <li class="tab"><a class="active" href="#test1">Todos</a></li>
            <li class="tab"><a href="#test2">Assistidos</a></li>
            <li class="tab"><a href="#test3">Favorites</a></li>
        </ul>
    </div>
</nav>

<div class="row">

    <form method="post" id="cadastrar-filme" enctype="multipart/form-data">
    <div class="col s6 offset-m3">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Cadastrar Filme</span>

                <div class="row">
                    <div class="input-field col s12">
                    <input placeholder="Nome do filme" name="title" id="title" type="text" class="validate">
                        <label for="title">Título</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea id=sinopse" name="sinopse" class="materialize-textarea"></textarea>
                        <label for=sinopse">sinopse</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s4">
                        <input type="number" id=nota" name="nota" class="validate" required step=".1" min=0 max=10>
                        <label for=nota">Nota</label>
                    </div>
                </div>


                <div class="file-field input-field">
                    <div class="btn purple lighten-1 black-text">
                        <span>Capa</span>
                        <input type="file" name="poster_file">
                    </div>
                    <div class="file-path-wrapper">
                        <label>
                            <input class="file-path validate" name="poster" id="poster" type="text">
                        </label>
                    </div>
                </div>


            </div>
            <div class="card-action">
                <a class="waves-effect waves-light btn red" href="/">Cancelar</a>
                <button class="waves-effect waves-light btn purple">Cadastrar</button>
            </div>
        </div>
    </div>
    </form>
</div>

<script>
//
//    let eForm = document.querySelector("#cadastrar-filme");
//
//    eForm.addEventListener("submit", (e)=>{
//        e.preventDefault();
//        //set values
//
//        let title = document.querySelector("#title").value;
//        let sinopse = document.querySelector("#sinopse");
//        let nota = document.querySelector("#nota").value;
//        let poster = document.querySelector("#poster").value;
//
//        let data = {
//            title,
//            nota,
//            sinopse,
//            poster
//        }
//
//        alert("lancei");
//        fetch("/inserirFilme.php", {
//            headers: {
//                "Content-Type": "application/x-www-form-urlencoded", "multipart/form-data",
//            },
//            method: 'POST',
//            body: URLSearchParams(data);
//        });
//
//
//    });

</script>

</body>
