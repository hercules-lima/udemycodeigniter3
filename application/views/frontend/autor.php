<!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    <?php echo $titulo ?>
                    <small>> 
                        <?php
                            if($subtitulo != ''){
                             echo $subtitulo; 
                            }else{
                                foreach ($subtitulodb as $dbtitulo) {
                                    echo $dbtitulo->titulo;
                                }
                            }
                        ?>    
                    </small>
                </h1>

                <?php
                    foreach ($autores as $autor) {

                ?>

               <div class="col-md-4">
<img class="img-responsive img-circle" src="http://placehold.it/200x200"
alt="">
</div>
<div class="col-md-8 ">
<h2>
<?php echo $autor->nome ?>
</h2> 
<hr>
<p><?php echo $autor->historico ?></p>
   <hr>
</div>
                <?php
                    }
                ?>

            </div>