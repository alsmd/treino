<header>
    <nav class="navbar">
        <div class="left">
            <a href="/" class="brand"></a>
            <div class="area-barra-pesquisar">
                <form action="/pesquisar" method="post">
                    <input type="text" class="barra-pesquisar" placeholder="Search" name='filter'>
                    <input type="submit" class="btn-pesquisar" value="" >
                </form>
            </div>
        </div>
        <div class="hamburger" id="hamburger">
            <input type="checkbox" class="toggler">
            <div></div>
        </div >
        <ul class="nav">
            <li><a href="">Most Popular</a></li>
            <li><a href="/anime">Anime</a></li>
            <li><a href="">Dubbed</a></li>
            <li><a href="">Movies</a></li>
            <li><a href="/categoria">Categories</a></li>
            <li><a href="">Schedule</a></li>
            <li><a href="">Random</a></li>
        </ul>
    </nav>

    <div class="menu" id='menu'>
        <ul class="nav">
            <li><a href="">Most Popular</a></li>
            <li><a href="/anime">Anime</a></li>
            <li><a href="">Dubbed</a></li>
            <li><a href="">Movies</a></li>
            <li><a href="/categoria">Categories</a></li>
            <li><a href="">Schedule</a></li>
            <li><a href="">Random</a></li>
        </ul>
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
</header>