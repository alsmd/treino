<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
    <!--Fontes-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    <!--Css-->
    <link rel="stylesheet" href="http://localhost:8080/src/css/normalize.css">
    <link rel="stylesheet" href="http://localhost:8080/src/css/style.css">
    <link rel="stylesheet" href="http://localhost:8080/src/css/partes/header.css">
    <link rel="stylesheet" href="http://localhost:8080/src/css/partes/scrollbar.css">
    <link rel="stylesheet" href="http://localhost:8080/src/css/partes/footer.css">
    <link rel="stylesheet" href="http://localhost:8080/src/css/partes/hamburger.css">

    <!--Favicon-->
    <link rel='icon' href='http://localhost:8080/src/fotos/favicon.ico' type='image/x-icon'>
</head>
<body>
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
    <?php $this->content(); ?>
        
    <footer>
        <div class="content">
            <div class="area-links">
                <p>Join us:</p>
                <div class="links">
                    <button>Discod</button>
                    <button>Regedit</button>
                </div>
            </div>
            <div class="">
                DMCA - Privacy Policy - AnimeKisa.org - AnimeKisa.net
            </div>
        </div>
    </footer>
</body>
</html>