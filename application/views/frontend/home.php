<!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Página Inicial -
                    <small>Postagens Recentes</small>
                </h1>

                <?php
                    foreach ($postagem as $destaque) {

                ?>

                <h2>
                    <a href="<?php echo base_url('postagem/'.$destaque->id.'/'.limpar($destaque->titulo))?>"><?php echo $destaque->titulo ?></a>
                </h2>
                <p class="lead">
                    por <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Postado em 25 de Janeiro de 2017 10:00</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p><?php echo $destaque->subtitulo ?></p>
                <a class="btn btn-primary" href="<?php echo base_url('postagem/'.$destaque->id.'/'.limpar($destaque->titulo))?>">Leia mais <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php
                    }
                ?>

            </div>