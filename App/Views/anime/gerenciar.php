<div class="pag-principal">
    <div class="cabecalho">
        <h1>Gerenciar Animes</h1>
    </div>
    <?php if(isset($_GET['mensagem'])){ ?>
        <p style="color:green;padding:2em;text-align:center;" class="border"><?php echo $_GET['mensagem']; ?></p>
    <?php }?>
    <div class="body">
        <div class="col-1">
            <form action="/admin/anime/save" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required>
                    <?php if(isset($_GET['nome'])){?>
                        <p style="color:var(--red)"><?php echo $_GET['nome']; ?></p>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="nome_alternativo">Nome Alternativo</label>
                    <input type="text" name="nome_alternativo" id="nome_alternativo">
                    <?php if(isset($_GET['nome_alternativo'])){?>
                        <p style="color:var(--red)"><?php echo $_GET['nome_alternativo']; ?></p>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" required>
                    <?php if(isset($_GET['slug'])){?>
                        <p style="color:var(--red)"><?php echo $_GET['slug']; ?></p>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" placeholder="" required>
                    <?php if(isset($_GET['foto'])){?>
                        <p style="color:var(--red)"><?php echo $_GET['foto']; ?></p>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="foto">Status</label>
                    <select name="status" id="">
                        <option value="andamento">Em andamento</option>
                        <option value="cancelado">Cancelado</option>
                        <option value="finalizado">Finalizado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto">Descricao</label>
                    <textarea id="" cols="30" rows="10" name="descricao" required></textarea>
                    <?php if(isset($_GET['descricao'])){?>
                        <p style="color:var(--red)"><?php echo $_GET['descricao']; ?></p>
                    <?php }?>
                </div>
                <div class="form-group-checkbox">
                    <label for="foto">Categorias</label>
                    <div class="categorias">
                        <?php foreach($this->view->categorias as $categoria){ ?>
                        <div class="categoria">
                            <input type="checkbox" name="categorias[]" id="" value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nome'] ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <button type="submit" class="submit">Criar</button>
            </form>
        </div>
        <div class="col-2">
        <?php foreach($this->view->animes as $anime){ ?>
            <div class="item border">
                <a class="slug" href="<?php echo '/anime/'.$anime['slug'] ?>" target="_blank"><?php echo $anime['nome'] ?></a>
                <div class="links">
                    <form action="/admin/anime/edite" method="POST">
                        <input type="hidden" name="id" value="<?php echo $anime['id']; ?>">
                        <button class="edite" type="submit">edite</button>
                    </form>
                    <form action="/admin/anime/delete" method="POST">
                        <input type="hidden" name="id" value="<?php echo $anime['id']; ?>">
                        <button class="remove" type="submit">delete</button>
                    </form>
                </div>
            </div>
        <?php }?>
        </div>
    </div>
</div>