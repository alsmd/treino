<link rel="stylesheet" href="http://localhost:8080/src/css/partes/perfil.css">
<div class="pag-principal">
    <div class="cabecalho">
        <h1>Profile</h1>
    </div>
    <div class="body">
        <div class="col-1">
            <form action="/perfil/save" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirmar Password</label>
                    <input type="text" name="confirmPassword" id="confirmPassword" required>
                </div>
                <button type="submit" class="submit btn-blue">Editar</button>
            </form>
        </div>
    </div>
</div>