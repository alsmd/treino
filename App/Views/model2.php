<link rel="stylesheet" href="src/css/partes/model2.css">
<main>
    <div class="area-principal">
        <div class="titulo">
            <?php echo $this->view->titulo; ?>
        </div>
        <div class="animes">
            <?php foreach($this->view->dados as $dado){ ?>
                <a class="anime" href="<?php echo $this->view->opcao.$dado['slug']; ?>"><?php echo $dado['nome']; ?> </a>
            <?php } ?>
        </div>
    </div>

    <?php $this->renderAside(); ?>
</main>
