<div class="pag-principal">
    <div class="cabecalho">
        <h1>Editar Categoria</h1>
    </div>
    <?php if(isset($_GET['mensagem'])){ ?>
        <p style="color:green;padding:2em;text-align:center;" class="border"><?php echo $_GET['mensagem']; ?></p>
    <?php }?>
    <div class="body">
        <div class="col-1">
            <form action="/admin/categoria/update" method="POST">
                <input type="hidden" name="id" value="<?php echo $this->view->categoria[0]['id']; ?>">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $this->view->categoria[0]['nome'] ?>" required>
                    <?php if(isset($_GET['nome'])){?>
                        <p style="color:var(--red)"><?php echo $_GET['nome']; ?></p>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" value="<?php echo $this->view->categoria[0]['slug'] ?>" required>
                    <?php if(isset($_GET['slug'])){?>
                        <p style="color:var(--red)"><?php echo $_GET['slug']; ?></p>
                    <?php }?>
                </div>
                <button type="submit" class="submit btn-blue">Editar</button>
            </form>
        </div>
        <div class="col-2">
            <?php foreach($this->view->categorias as $categoria){ ?>
            <div class="item border">
                <a class="slug" href="<?php echo '/categoria/'.$categoria['slug'] ?>" target="_blank"><?php echo $categoria['nome'] ?></a>
                <div class="links">
                    <form action="/admin/categoria/edite" method="POST">
                        <input type="hidden" name="id" value="<?php echo $categoria['id']; ?>">
                        <button class="edite" type="submit">edite</button>
                    </form>
                    <form action="/admin/categoria/delete" method="POST">
                        <input type="hidden" name="id" value="<?php echo $categoria['id']; ?>">
                        <button class="remove" type="submit">delete</button>
                    </form>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>