<div class="pag-principal">
    <div class="cabecalho">
        <h1>Editar Anime</h1>
    </div>
    <?php if(isset($_GET['mensagem'])){ ?>
        <p style="color:green;padding:2em;text-align:center;" class="border"><?php echo $_GET['mensagem']; ?></p>
    <?php }?>
    <div class="body">
        <div class="col-1">
            <form action="/admin/anime/update" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $this->view->anime['id'] ?>">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $this->view->anime['nome'] ?>" required>
                    <?php if(isset($_GET['nome'])){?>
                        <p style="color:var(--red)"><?php echo $_GET['nome']; ?></p>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="nome_alternativo">Nome Alternativo</label>
                    <input type="text" name="nome_alternativo" id="nome_alternativo" value="<?php echo $this->view->anime['nome_alternativo'] ?>">
                    <?php if(isset($_GET['nome_alternativo'])){?>
                        <p style="color:var(--red)"><?php echo $_GET['nome_alternativo']; ?></p>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" value="<?php echo $this->view->anime['slug'] ?>" required>
                    <?php if(isset($_GET['slug'])){?>
                        <p style="color:var(--red)"><?php echo $_GET['slug']; ?></p>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto">
                    <?php if(isset($_GET['foto'])){?>
                        <p style="color:var(--red)"><?php echo $_GET['foto']; ?></p>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="foto">Status</label>
                    <select name="status" id="">
                        <option value="andamento" <?php if($this->view->anime['status'] == 'andamento') echo 'selected' ?>>Em andamento</option>
                        <option value="cancelado" <?php if($this->view->anime['status'] == 'cancelado') echo 'selected' ?>>Cancelado</option>
                        <option value="finalizado" <?php if($this->view->anime['status'] == 'finalizado') echo 'selected' ?>>Finalizado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto">Descricao</label>
                    <textarea id="" cols="30" rows="10" name="descricao" required><?php echo $this->view->anime['descricao'] ?></textarea>
                    <?php if(isset($_GET['descricao'])){?>
                        <p style="color:var(--red)"><?php echo $_GET['descricao']; ?></p>
                    <?php }?>
                </div>
                <div class="form-group-checkbox">
                    <label for="foto">Categorias</label>
                    <div class="categorias">
                        <?php foreach($this->view->categorias as $categoria){ ?>
                        <div class="categoria">
                            <input type="checkbox" name="categorias[]" id="" value="<?php echo $categoria['id'] ?>" <?php if(in_array($categoria['id'],$this->view->categorias_usadas)) echo 'checked' ?>><?php echo $categoria['nome'] ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <button type="submit" class="submit btn-blue">Edite</button>
            </form>
        </div>


        <div>
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
            <div class="">
                <h2 class='white' style="margin-top:2.5em;margin-bottom:.5em;text-align:center;">Adicionar Episodio</h2>
                <form action="/admin/anime/saveEpisodio" method="POST">
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" id="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="episodio">Numero</label>
                        <input type="text" name="episodio" id="episodio" required min>
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" id="link" required min>
                    </div>
                    <input type="hidden" name="fk_id_anime" value="<?php echo $this->view->anime['id'] ?>">
                    <button type="submit" class="submit btn-green">Criar</button>
                </form>
            </div>

            <div class="">
                <h2 class='white' style="margin-top:1.5em;margin-bottom:.5em;text-align:center;">Deletar Episodio</h2>
                <form action="/admin/anime/deleteEpisodio" method="POST">
                    <div class="form-group">
                        <label for="episodio">Numero</label>
                        <select name="episodio" id="">
                            <?php foreach($this->view->episodios as $episodio){ ?>
                            <option value="<?php echo $episodio['episodio']; ?>"><?php echo $episodio['episodio']; ?></option>
                            <?php } ?>
                        </select>
                        
                    </div>
                    <input type="hidden" name="fk_id_anime" value="<?php echo $this->view->anime['id'] ?>">
                    <button type="submit" class="submit btn-red">Deletar</button>
                </form>
            </div>
        </div>


    </div>
</div>