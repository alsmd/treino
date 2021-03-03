<link rel="stylesheet" href="http://localhost:8080/src/css/partes/anime.css">
<main>
    <div class="area-principal ">
        <div class="superior border" style="border-top: none !important;">
            <div class="area-imagem">
                <img src="http://www.localhost:8080/<?php echo $this->view->anime['foto'] ?>" alt="">
            </div>
            <div class="descricao">
               <h3><?php echo $this->view->anime['nome'] ?></h3>

               <p><?php echo $this->view->anime['descricao'] ?></p>

               <div class="informacoes-extras">
                   <div class="categorias">
                    <p style="display: inline;">Categorias:</p> 
                    <?php $interacao =count($this->view->categorias) -1 ; foreach($this->view->categorias as $indice => $categoria){ ?>
                        <a href="/categoria/<?php echo $categoria['slug'] ?>" class="categoria"><?php echo $categoria['nome'] ?></a> <?php if($interacao != $indice) echo ',';?>
                    <?php }?>
                   </div>
                   <p>Status: <span class="white"><?php echo $this->view->anime['status'] ?></span></p>
               </div>
            </div>
        </div>
        <div class="inferior">
            <?php foreach($this->view->episodios as $episodio){ ?>
            <a class="ep_background" href="/anime/<?php echo $this->view->anime['slug'].'/'.$episodio['episodio']?>">
                <div class="ep border">
                    <div class="cabecalho">
                        Episode
                    </div>
                    <div class="body">
                        <?php echo $episodio['episodio'] ?>
                    </div>
                    <div class="footer">
                        2 dias Atraz
                    </div>
                </div>
            </a>
            <?php }?>

        </div>
    </div>

    <?php $this->renderAside(); ?>
</main>


