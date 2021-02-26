<div class="pag-principal">
    <div class="cabecalho">
        <h1>Gerenciar Categorias</h1>
    </div>
    <?php if(isset($_GET['mensagem'])){ ?>
        <p style="color:green;padding:2em;text-align:center;" class="border"><?php echo $_GET['mensagem']; ?></p>
    <?php }?>
    <div class="body">
        <div class="col-1">
            <form action="/admin/categoria/save" method="POST">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome">
                    <?php if(isset($_GET['nome'])){?>
                        <p style="color:var(--red)"><?php echo $_GET['nome']; ?></p>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug">
                    <?php if(isset($_GET['slug'])){?>
                        <p style="color:var(--red)"><?php echo $_GET['slug']; ?></p>
                    <?php }?>
                </div>
                <button type="submit" class="submit">Criar</button>
            </form>
        </div>
        <div class="col-2">
            <div class="item border">
                <div class="slug">acao-e-aventura</div>
                <div class="links">
                    <button class="edite">edite</button>
                    <button class="remove">delete</button>
                </div>
            </div>
        </div>
    </div>
</div>