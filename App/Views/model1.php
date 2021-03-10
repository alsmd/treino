<link rel="stylesheet" href="http://localhost:8080/src/css/partes/model1.css">
<link rel="stylesheet" href="http://localhost:8080/src/css/partes/selectors.css">
<main>
    <div class="area-principal">
        <?php if($this->view->animes->count() == 0){ ?>
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
                <div class="selector <?php if(isset($_GET['tipo']) && $_GET['tipo'] == 'legendado'){echo 'selecionado';} ?>" id="legendado">
                    Subbed
                </div>
                <div class="selector <?php if(isset($_GET['tipo']) && $_GET['tipo'] == 'dublado'){echo 'selecionado';} ?>" id="dublado">
                    Dubbed
                </div>
            </div>
                <script>
                    let dublado = document.getElementById('dublado');
                    let legendado = document.getElementById('legendado');
                    let filter = "<?php  if(isset($this->view->filter)){echo $this->view->filter;}else{echo '';}  ?>";
                    if(filter != ''){
                        filter = "&&filter="+filter;
                    }else{
                        filter = '';
                    }
                    dublado.addEventListener('click',function(e){
                        window.location="?tipo=dublado"+filter;
                    });
                    legendado.addEventListener('click',function(e){
                        window.location="?tipo=legendado"+filter;
                    });
                </script>
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
                                foreach($anime->categorias()->get() as $categorias){
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
                    <?php 
                        $href = isset($_GET['page']) ? "?page=".$_GET['page'] + 1: "?page=2";
                        $href = isset($_GET['tipo']) ? $href .'&tipo='.$_GET['tipo']:$href;
                        $href = isset($this->view->filter) ? $href .'&filter='. $this->view->filter:$href;

                    ?>
                    <a class="selector next" href="<?php echo $href; ?>" style="display:block;"> 
                        Next Page
                    </a>
                </div>
            <?php } ?>
        <?php }?>
    </div>

    <?php $this->renderAside(); ?>
</main>
