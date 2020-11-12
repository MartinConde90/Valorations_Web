<?php

require_once 'clases.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Subir</title>
        <meta charset="utf-8">
        <link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
        <div class="cabecera">
            <div class="logo"><a href="menu.php">El Pretencioso</a></div>
        </div>
        
            <div class="conjunto2"> 
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?tipo='.$_GET['tipo'];?>" enctype="multipart/form-data">
                <div class="contenedorS">
                    <div class="logintxt">
                        <strong>Nueva publicación</strong>
                    </div>

                <?php
                $nombre = $_GET['tipo'];

                //$f = new elemento();
                
               // $f->formularioIni();
                $n = new $nombre();
                
                //$f->formularioFin();

                ?>
                         
                </div>
			</form>
            </div>
		
    </body> 
    <footer>Este documento fue escrito en 2011.</footer>
</html>