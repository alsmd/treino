<link rel="stylesheet" href="http://localhost:8080/src/css/partes/aside.css">
<link rel="stylesheet" href="http://localhost:8080/src/css/partes/admin.css">
<div class="menu" id='menu'>
    <div class="noticia anime-nome-list">
        <div class="nomes-container">
            <div class="body">
                <a  class="mensagem">Dashbord</a>
            </div>
            <div class="body">
                <a  class="mensagem">Animes</a>
            </div>
            <div class="body">
                <a  class="mensagem">Categorias</a>
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
<main>
    <div class="border">
        <h1>AQUI É A ARE ADMINISTRATIVA</h1>
    </div>
    
    <div class="area-lateral">
        <div class="noticia anime-nome-list">
            <div class="cabecalho">
                Sessões
            </div>
            <div class="nomes-container">
                <div class="body">
                    <span  class="mensagem">Dashbord</span>
                </div>
                <div class="body">
                    <span  class="mensagem">Animes</span>
                </div>
                <div class="body">
                    <span  class="mensagem">Categorias</span>
                </div>
                <div class="body">
                    <span  class="mensagem">Comentarios</span>
                </div>
                <div class="body">
                    <span  class="mensagem">Usuarios</span>
                </div>
                <div class="body">
                    <span  class="mensagem">Your profile</span>
                </div>
            </div>
        </div>
    </div>
    <div class="hamburger" id="hamburger">
        <input type="checkbox" class="toggler">
        <div></div>
    </div >

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