<link rel="stylesheet" href="http://localhost:8080/src/css/partes/aside.css">
<div class="area-lateral">
    <?php if(isset($_SESSION['email'])){ ?>
        <div class="noticia">
            <div class="cabecalho">
                Bem vindo!
            </div>
            <div class="body">
                <a  class="mensagem" href="/perfil">Mude suas configurações <?php if(isset($_SESSION['nome'])){echo $_SESSION['nome'];}else{echo $_SESSION['email'];}  ?></a>
                <a class="btn-red btn" type="link" href="/login/sair">sair</a>
            </div>
        </div>
    <?php }else{ ?>
        <!-- LOGAR -->
        <div class="noticia login" id="login">
            <form action="/login/logar" method="POST">
                <div class="cabecalho">
                    Logue em Nossa Plataforma
                </div>
                <div class="body">
                    <input type="text" placeholder="Email" name="email">
                    <input type="password" placeholder="Senha" name="password">
                    <button class="btn-red">Logue</button>
                    <a  class="white"  id="open-register">Não possui uma conta?</a>
                </div>
            </form>
        </div>
        <!-- Registrar -->
        <div class="noticia registro" id="registro">
            <form action="/login/registrar" method="POST">
                <div class="cabecalho" style="color: var(--blue);">
                    Registre-se em Nossa Plataforma
                </div>
                <div class="body">
                    <input type="text" placeholder="Email" name="email">
                    <input type="password" placeholder="Senha" name="password">
                    <button class="btn-blue">Registrar</button>
                    <a  class="white"  id="open-login">Ja possui uma conta?</a>
                </div>
            </form>
        </div>
        <script>
            let open_login = document.getElementById('open-login');
            let open_register = document.getElementById('open-register');
            let login = document.getElementById('login');
            let register = document.getElementById('registro');

            open_login.addEventListener('click',function(e){
                login.style.display="block";
                register.style.display="none";
                console.log('tamo aqui');
            });
            open_register.addEventListener('click',function(e){
                login.style.display="none";
                register.style.display="block";
                console.log('tamo aqui');
            });
        </script>
    <?php } ?>
    <div class="noticia">
        <div class="cabecalho">
            Join Us on Regedit
        </div>
        <div class="body">
            <span  class="mensagem">Ask and share memes</span>
            <button>Join The Regedit</button>
        </div>
    </div>

    <!--Lista dos animes ainda sendo postados-->
    <div class="noticia anime-nome-list">
        <div class="cabecalho">
            Ongoing Animes
        </div>
        <div class="nomes-container">
            <?php
                //lista todos os animes que estão em andamento
                $animes = (new \App\Models\Anime())->where("status",'andamento')->get();
                foreach($animes as $anime){
            ?>
                <div class="body">
                    <a  class="mensagem" href="/anime/<?php echo $anime['slug'] ?>"><?php echo $anime['nome'] ?> </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div> 