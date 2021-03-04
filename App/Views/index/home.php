<link rel="stylesheet" href="src/css/partes/main.css">
<link rel="stylesheet" href="src/css/partes/selectors.css">
<div class="banner">
</div>
<main>
    <div class="area-principal">
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
            <?php foreach($this->view->episodios as $episodio){ 
            $anime_episodio = ($this->view->anime->read('where id = :id',['id'=> $episodio['fk_id_anime']]))[0];?>
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
        <div class="footer">
            <div class="selector next">
                Next Page
            </div>
        </div>
    </div>
    <?php $this->renderAside(); ?>
   
</main>
