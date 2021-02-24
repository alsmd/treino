<link rel="stylesheet" href="http://localhost:8080/src/css/partes/model1.css">
<link rel="stylesheet" href="http://localhost:8080/src/css/partes/selectors.css">
<main>
    <div class="area-principal">
        <div class="cabecalho">
            <h2>Animes</h2>
        </div>
        <div class="selectors">
            <div class="selector">
                Subbed
            </div>
            <div class="selector">
                Dubbed
            </div>
        </div>
        <!--Animes-->
        <div class="area-animes">
            <?php $posicao = 1; foreach($this->view->animes as $anime){ ?>
                <div class="anime">
                    <div class="cabecalho">
                        <img src="<?php echo $anime['foto'] ?>" alt="">
                    </div>
                    <div class="body">
                        <p class="nome"><?php echo $posicao ?>º <?php echo $anime['nome'] ?></p>
                        <p class="categorias">
                            <?php 
                            $x = 0;
                            foreach($anime['categorias'] as $categorias){
                                if($x == 0){
                                    echo ' '. $categorias['nome'];
                                }else{
                                    echo ' , '. $categorias['nome'];
                                }
                                $x++;
                            } ?>

                        </p>
                    </div>
                </div>
            <?php $posicao++; } ?>

            
        </div><!--Fim animes-->
        <?php if(count($this->view->animes) == 8){ ?>
            <div class="footer">
                <div class="selector next">
                    Next Page
                </div>
            </div>
        <?php } ?>
    </div>

    <?php $this->renderAside(); ?>
</main>
