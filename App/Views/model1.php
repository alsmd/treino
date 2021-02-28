<link rel="stylesheet" href="http://localhost:8080/src/css/partes/model1.css">
<link rel="stylesheet" href="http://localhost:8080/src/css/partes/selectors.css">
<main>
    <div class="area-principal">
        <?php if(count($this->view->animes) == 0){ ?>
            <div class="cabecalho ">
                <h2>Ooops... Nothing found!</h2>
            </div>
            <div class="cabecalho white border">
                <p>We are 99% sure we have the anime you are looking for. Here are a few tips to make it easier to find it.
                Let's say you are searching for "Seven Deadly Sins":</p>

                <p>1) Try the alternative japanese title "Nanatsu no Taizai" (Check MyAnimeList's page).</p>

                <p>2) Try using just one word like "Seven", "Deadly", "Nanatsu" or "Taizai".</p>

                <p>3) Make sure you are not searching "7 deadly sins", instead of "seven deadly sins".</p>
            </div>

        <?php }else{ ?>
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
                    <a class="anime" href="<?php echo '/anime/'.$anime['slug'] ?>">
                        <div class="cabecalho">
                            <img src="http://www.localhost:8080/<?php echo $anime['foto'] ?>" alt="">
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
                    </a>
                <?php $posicao++; } ?>
            </div><!--Fim animes-->
            <?php if(count($this->view->animes) == 8){ ?>
                <div class="footer">
                    <div class="selector next">
                        Next Page
                    </div>
                </div>
            <?php } ?>
        <?php }?>
    </div>

    <?php $this->renderAside(); ?>
</main>
