<link rel="stylesheet" href="http://localhost:8080/src/css/partes/aside.css">
<link rel="stylesheet" href="http://localhost:8080/src/css/partes/admin.css">
<div class="menu" id='menu'>
    <div class="noticia anime-nome-list">
        <div class="nomes-container">
            <div class="body">
                <a  class="mensagem">Dashbord</a>
            </div>
            <div class="body dropdown">
                <a  class="mensagem dropdown-toggler">Anime <i class="fas fa-caret-down"></i></a>
                <div class="dropdown-container">
                    <a href="/admin/anime/gerenciar" class="dropdown-item">Gerenciar</a>
                </div>
            </div>
            <div class="body dropdown">
                <a  class="mensagem dropdown-toggler">Categorias <i class="fas fa-caret-down"></i></a>
                <div class="dropdown-container">
                    <a href="/admin/anime/gerenciar" class="dropdown-item">Gerenciar</a>
                </div>
            </div>
            <div class="body">
                <a  class="mensagem">Comentarios</a>
            </div>
            <div class="body">
                <a  class="mensagem">Usuarios</a>
            </div>
            <div class="body">
                <a  class="mensagem">Your profile</a>
            </div>
        </div>
    </div>
</div>
<div class="hamburger" id="hamburger">
        <input type="checkbox" class="toggler">
        <div></div>
    </div >
<main>

    <div class="border area-administrativa">
        <?php
        if(isset($this->view->adminPageAtual)){
            $this->render($this->view->adminPageAtual);
        }else{?>
        <div class="pag-principal">
            <div class="cabecalho">
                <h1>Bem vindo a Area Administrativa</h1>
            </div>
        </div>
        <?php }?>

    </div>
    
    <div class="area-lateral">
        <div class="noticia anime-nome-list">
            <div class="cabecalho">
                Sessões
            </div>
            <div class="nomes-container">
                <div class="body">
                    <a  class="mensagem">Dashbord</a>
                </div>
                <div class="body dropdown">
                    <a  class="mensagem dropdown-toggler">Animes <i class="fas fa-caret-down"></i></a>
                    <div class="dropdown-container">
                        <a href="/admin/anime/gerenciar" class="dropdown-item">Gerenciar</a>
                    </div>
                </div>
                <div class="body dropdown">
                    <a  class="mensagem dropdown-toggler">Categorias <i class="fas fa-caret-down"></i></a>
                    <div class="dropdown-container">
                        <a href="/admin/categoria/gerenciar" class="dropdown-item">Gerenciar</a>
                    </div>
                </div>
                <div class="body">
                    <a  class="mensagem">Comentarios</a>
                </div>
                <div class="body">
                    <a  class="mensagem">Usuarios </a>
                </div>
                <div class="body">
                    <a  class="mensagem">Your profile</a>
                </div>
            </div>
        </div>
    </div>


    <script>
        //mostrar e ocultar menu
        let button = document.getElementById('hamburger');
        button.addEventListener('click',function(e){
            let classe = document.getElementById('menu');
            console.log(classe.className);
            if(classe.className == 'menu'){
                classe.className = 'menu2';
            }else{
                classe.className = 'menu';
            }
        })
    </script> 
</main>