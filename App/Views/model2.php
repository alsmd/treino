<link rel="stylesheet" href="src/css/partes/model2.css">
<main>
    <div class="area-principal">
        <div class="titulo">
            Categorias
        </div>
        <div class="animes">
            <?php foreach($this->view->categorias as $categoria){ ?>
                <a class="anime" href="categoria/<?php echo $categoria['slug']; ?>"><?php echo $categoria['nome']; ?> (5)</a>
            <?php } ?>
        </div>
    </div>

    <?php $this->renderAside(); ?>
</main>
