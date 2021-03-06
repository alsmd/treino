<link rel="stylesheet" href="http://localhost:8080/src/css/partes/aside.css">
<div class="area-lateral">
    <div class="noticia">
        <div class="cabecalho">
            Join Our Discord
        </div>
        <div class="body">
            <span class="mensagem"> Chat with 2300+ awasome weebs;</span>
            <button>Join The Discord</button>
        </div>
    </div>

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