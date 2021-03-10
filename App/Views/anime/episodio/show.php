<link rel="stylesheet" href="http://localhost:8080/src/css/partes/episodio.css">
<main class="episodio">
    <div class="cabecalho">
        <h3 class="white"><a href="<?php echo '/anime/'.$this->view->anime['slug'] ?>"><?php echo $this->view->anime['nome'] ?></a>- Episode <?php echo $this->view->episodio['episodio'] ?></h3>
        <div class="nav">
            <div class="server">
                <select name="" id="" >
                    <option value="">VidCDN Server</option>
                    <option value="">VidCDN Server</option>
                    <option value="">VidCDN Server</option>
                </select>
            </div>
            <div class="episodios">
                <select name="" id="">
                    <option value="">Episode 3</option>
                    <option value="">Episode 3</option>
                    <option value="">Episode 3</option>
                </select>
            </div>
        </div>
    </div>
    <div class="content">
        <iframe src="<?php echo $this->view->episodio['link'] ?>" allowfullscreen="true" frameborder="0"  scrolling="no" width="100%" height="100%"></iframe>

    </div>
    <div class="footer">
        <span class="titulo">title: </span> <?php echo $this->view->episodio['titulo'] ?>
    </div>
</main>
<div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    
    var disqus_config = function () {
    this.page.url = 'http://www.localhost:8080/anime/'+ '<?php echo $this->view->anime["slug"]."/".$this->view->episodio["episodio"] ?>';  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = "<?php echo $this->view->anime['id'].'-'.$this->view->episodio['id']?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://localhost-8080-333nraliol.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>