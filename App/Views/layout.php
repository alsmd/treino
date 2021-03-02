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
    <!--FontAsome-->
    <link rel="stylesheet" href="http://localhost:8080/src/css/fontawesome/css/all.css">
    
</head>
<body>
    <?php 
        $admin = explode('/',$_SERVER['REQUEST_URI'])[1];
        if($admin == 'admin'){
            $this->header(2); 
        }else{
            $this->header(1); 
        }
    ?>
   
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