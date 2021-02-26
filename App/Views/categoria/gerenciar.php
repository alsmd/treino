<div class="pag-principal">
    <div class="cabecalho">
        <h1>Gerenciar Categorias</h1>
    </div>
    <div class="body">
        <div class="col-1">
            <form action="/admin/categoria/save" method="POST">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug">
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