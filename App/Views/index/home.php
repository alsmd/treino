<link rel="stylesheet" href="src/css/partes/main.css">
<link rel="stylesheet" href="src/css/partes/selectors.css">
<div class="banner">
</div>
<main>
    <div class="area-principal">
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
            <?php foreach($this->view->episodios as $episodio){ 
            $anime_episodio = $this->view->anime->where('id', $episodio['fk_id_anime'])->first();?>
            <a class="anime" href="/anime/<?php echo $anime_episodio['slug'].'/'.$episodio['episodio'] ?>">
                <div class="cabecalho">
                    <img src="<?php echo $anime_episodio['foto'] ?>" alt="" width="100%">
                </div>
                <div class="descricao">
                    <p>Episode <?php echo $episodio['episodio'] ?></p>
                    <p>4 h ago</p>
                </div>
                <div class="footer">
                    <?php
                        echo $anime_episodio['nome'];
                    ?>
                </div>
            </a>
            <?php } ?>
        </div> <!--Fim area dos animes-->
        <?php if(count($this->view->episodios) == 2){ ?>
            <div class="footer">
                <?php 
                    $href = isset($_GET['page']) ? "?page=".$_GET['page'] + 1: "?page=2";
                    $href = isset($_GET['tipo']) ? $href .'&tipo='.$_GET['tipo']:$href;
                ?>
                <a class="selector next" href="<?php echo $href; ?>" style="display:block;"> 
                    Next Page
                </a>
            </div>
        <?php } ?>
    </div>
    <?php $this->renderAside(); ?>
   
</main>
