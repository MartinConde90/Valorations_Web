<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
    
        <meta charset='UTF-8'>
		<meta name="Viewport" content="weight=device-width, initial-scale=1.0">
        <title>Menu</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
<body>
    <?php
    
    class Inicio{

        public function Menu(){
            include 'cabecera.php';
            ?>
                
                
                <div class="conjunto">    
                    
                        <ul class="submenu">
                            <a href=""><li style="border-top-left-radius: 10px;">Libros</li></a>
                            <a href=""><li>Peliculas</li></a>
                            <a href=""><li style="border-top-right-radius: 10px;">Juegos</li></a>
                        </ul>                    
                    
                    
                    <div class="contenido">  
                        <?php
                            $directorioImagenes = 'img';
                            $imaxes = array();
                            if(is_dir($directorioImagenes))
                            {
                                $imaxes = scandir($directorioImagenes);
                            }
                        ?>
                        <?php foreach($imaxes as $nomeImaxe): ?>
                            
                                <?php if($nomeImaxe != '.' && $nomeImaxe != '..'):?> 
                                    <div class="portada">   
                                    <img id="datosImg" src="<?php echo $directorioImagenes . '/' . $nomeImaxe;?>"  onclick="obtenerinfo(this)">     
                                    
                                    <a href="elemento.php?nombreElemento=<?php echo urlencode($nomeImaxe);?>" class="titulofoto">
                                        <?php 
                                        $posicionPuntoExtension = strrpos($nomeImaxe, '.');
                                        echo substr($nomeImaxe, 0, $posicionPuntoExtension);?>
                                    </a>  
                                    </div>
                                <?php endif; ?>
                            
                        <?php endforeach; ?>               
                    </div>  
                </div> 
        <script>
            function obtenerinfo(elemento){ 
            let DatosImg = elemento.getAttribute('src'); 
            //document.write(DatosImg); 
            location.href = "elementobd.php?nombreElemento=" +encodeURIComponent(DatosImg); //cambia la url añadiendole lo que va despues del ? y del +
            }
        </script>
        <?php
        
        }

    }
    
        $f = new Inicio();  
        $f->Menu();
        ?>
    <footer>
        <a target="_blank" href="https://www.facebook.com/share.php?u=https://www.ElPretencioso.com/&title=ElPretencioso" class="fb-xfbml-parse-ignore"><img src="facebook.png"></a>
        </div>
        <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=Hello%20world" data-size="large" ><img src="twitt.png"></a>
        <p>&copy; 2020 ElPretencioso.com<p>
    </footer>
</body>
</html>