<link rel="stylesheet" href="http://localhost:8080/src/css/partes/anime.css">
<main>
    <div class="area-principal ">
        <div class="superior border" style="border-top: none !important;">
            <div class="area-imagem">
                <img src="http://www.localhost:8080/<?php echo $this->view->anime['foto'] ?>" alt="">
            </div>
            <div class="descricao">
               <h3><?php echo $this->view->anime['nome'] ?></h3>

               <p><?php echo $this->view->anime['descricao'] ?></p>

               <div class="informacoes-extras">
                   <div class="categorias">
                    <p style="display: inline;">Categorias:</p> 
                    <?php $interacao =count($this->view->categorias) -1 ; foreach($this->view->categorias as $indice => $categoria){ ?>
                        <a href="/categoria/<?php echo $categoria['slug'] ?>" class="categoria"><?php echo $categoria['nome'] ?></a> <?php if($interacao != $indice) echo ',';?>
                    <?php }?>
                   </div>
                   <p>Status: <span class="white"><?php echo $this->view->anime['status'] ?></span></p>
               </div>
            </div>
        </div>
        <div class="inferior">
            <div class="ep_background">
                <div class="ep border">
                    <div class="cabecalho">
                        Episode
                    </div>
                    <div class="body">
                        01
                    </div>
                    <div class="footer">
                        2 dias Atraz
                    </div>
                </div>
            </div>

            <div class="ep_background">
                <div class="ep border">
                    <div class="cabecalho">
                        Episode
                    </div>
                    <div class="body">
                        01
                    </div>
                    <div class="footer">
                        2 dias Atraz
                    </div>
                </div>
            </div>


            <div class="ep_background">
                <div class="ep border">
                    <div class="cabecalho">
                        Episode
                    </div>
                    <div class="body">
                        01
                    </div>
                    <div class="footer">
                        2 dias Atraz
                    </div>
                </div>
            </div>


            <div class="ep_background">
                <div class="ep border">
                    <div class="cabecalho">
                        Episode
                    </div>
                    <div class="body">
                        01
                    </div>
                    <div class="footer">
                        2 dias Atraz
                    </div>
                </div>
            </div>



            <div class="ep_background">
                <div class="ep border">
                    <div class="cabecalho">
                        Episode
                    </div>
                    <div class="body">
                        01
                    </div>
                    <div class="footer">
                        2 dias Atraz
                    </div>
                </div>
            </div>


            <div class="ep_background">
                <div class="ep border">
                    <div class="cabecalho">
                        Episode
                    </div>
                    <div class="body">
                        01
                    </div>
                    <div class="footer">
                        2 dias Atraz
                    </div>
                </div>
            </div>



            <div class="ep_background">
                <div class="ep border">
                    <div class="cabecalho">
                        Episode
                    </div>
                    <div class="body">
                        01
                    </div>
                    <div class="footer">
                        2 dias Atraz
                    </div>
                </div>
            </div>



            <div class="ep_background">
                <div class="ep border">
                    <div class="cabecalho">
                        Episode
                    </div>
                    <div class="body">
                        01
                    </div>
                    <div class="footer">
                        2 dias Atraz
                    </div>
                </div>
            </div>



            <div class="ep_background">
                <div class="ep border">
                    <div class="cabecalho">
                        Episode
                    </div>
                    <div class="body">
                        01
                    </div>
                    <div class="footer">
                        2 dias Atraz
                    </div>
                </div>
            </div>



            <div class="ep_background">
                <div class="ep border">
                    <div class="cabecalho">
                        Episode
                    </div>
                    <div class="body">
                        01
                    </div>
                    <div class="footer">
                        2 dias Atraz
                    </div>
                </div>
            </div>



            <div class="ep_background">
                <div class="ep border">
                    <div class="cabecalho">
                        Episode
                    </div>
                    <div class="body">
                        01
                    </div>
                    <div class="footer">
                        2 dias Atraz
                    </div>
                </div>
            </div>



                        <div class="ep_background">
                <div class="ep border">
                    <div class="cabecalho">
                        Episode
                    </div>
                    <div class="body">
                        01
                    </div>
                    <div class="footer">
                        2 dias Atraz
                    </div>
                </div>
            </div>


            <div class="ep_background">
                <div class="ep border">
                    <div class="cabecalho">
                        Episode
                    </div>
                    <div class="body">
                        01
                    </div>
                    <div class="footer">
                        2 dias Atraz
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->renderAside(); ?>
</main>

<div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    
    var disqus_config = function () {
    this.page.url = 'http://www.localhost:8080/anime/'+ '<?php echo $this->view->anime["slug"] ?>';  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = "<?php echo $this->view->anime['id']?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    var teste ="<?php echo $this->view->anime['id']?>";
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://localhost-8080-333nraliol.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
