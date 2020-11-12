<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    
    <meta charset="utf-8" name="viewport" content="widh=device-width,initial-scale=1.0">
        <title>Elemento</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <?php  
    $nombre = $_GET['nombreElemento'];
    $posicionBarra = strrpos($nombre, '/');
    $posicionPunto = strrpos($nombre, '.');
    
    echo $nombre;
    echo $posicionBarra;
    echo "<br>";
    echo $posicionPunto;
    echo "<br>";
    
    
    if($posicionBarra == false){
        $nombre = substr($nombre, 0, $posicionPunto);
        //echo $nombre;
    }
    if($posicionBarra !== false){
        $nombre = substr($nombre, $posicionBarra + 1, $posicionPunto-$posicionBarra-1); //el segundo parametro es la longitud de cuantos caracteres tiene que coger
        //echo $nombre;
    }
    $datos = json_decode(file_get_contents("infoElemento/info.txt"), true);
    //var_dump($datos);

    $TituloO = '';
    $Titulo = '';
    $Genero = '';
    $Subgenero = '';
    $Autor = '';
    $Pais = '';
    $Editorial = '';
    $Fecha = '';
    $Paginas = '';
    $Saga = '';
    $Sinopsis = '';
    $Imagen = '';



    foreach($datos as $clave){
        $existe = array_search($nombre, $clave); // $clave = 2;
        if($existe !== false){
            $Titulo = $clave[0];
            $TituloO = $clave[1];
            $Genero = $clave[2];
            $Subgenero = $clave[3];
            $Autor = $clave[4];
            $Pais = $clave[5];
            $Editorial = $clave[6];
            $Fecha = $clave[7];
            $Paginas = $clave[8];
            $Saga = $clave[9];
            $Sinopsis = $clave[10];
            $Imagen = $clave[11];
        }
        //echo $existe; busca la posicion, no si existe o no, lerdo
    }
    ?>
    
    <body>
        <?php
        include 'cabecera.php';
        ?>
        
        <div class="conjunto">
            <div>
                <h1><?php echo $Titulo;?></h1>
                
            </div>
            <div class="contenidoE">
                <div>
                    <form>
                            <p class="clasificacion">
                                <input id="radio1" type="radio" name="estrellas" value="5">
                                <label for="radio1">&#10031;</label>
                                <input id="radio2" type="radio" name="estrellas" value="4">
                                <label for="radio2">&#10031;</label>
                                <input id="radio3" type="radio" name="estrellas" value="3">
                                <label for="radio3">&#10031;</label>
                                <input id="radio4" type="radio" name="estrellas" value="2">
                                <label for="radio4">&#10031;</label>
                                <input id="radio5" type="radio" name="estrellas" value="1">
                                <label for="radio5">&#10031;</label>
                            </p>
                        </form>
                </div>
                <div class="imagen">
                    <img src="<?php echo $Imagen;?>">
                </div>  
                <h2>Sinopsis:</h2>
                    
                    
                <p class="sinopsis">
                <?php echo $Sinopsis;?>
                </p>
            </div>
            <div class="informacion">
                <h2>Título Original: <?php echo $TituloO;?></h2>
                <h2>Género: <?php echo $Genero;?></h2>
                <h2>Subgénero: <?php echo $Subgenero;?></h2>
                <h2>Autor: <?php echo $Autor;?></h2>
                <h2>País: <?php echo $Pais;?></h2>
                <h2>Editorial: <?php echo $Editorial;?></h2>
                <h2>Fecha de publicación: <?php echo $Fecha;?></h2>
                <h2>Número de páginas: <?php echo $Paginas;?></h2>
                <h2>Saga: <?php echo $Saga;?></h2>
            </div>

            <?php
                if(isset($_SESSION['nombreUsuario'])){ ?>
            <div class="comentarios">
                <input type="text" placeholder="Escribe algo para publicar">
                <div class="comentarioUsuario">
                <p>
                    ardos. »Me llamo Kvothe.
                    Quizá hayas oído hablar de mi.
                    En una posada en tierra de nadie, un hombre se dispone a relatar,
                    por primera vez, la auténtica historia de su vida. 
                    Una historia que únicamente él conoce y que ha quedado
                    diluida tras los rumores, las conjeturas y los cuentos de taberna 
                    que le han convertido en un personaje legendario a quien todos daban ya 
                    por muerto: Kvothe# músico, mendigo, ladrón, estudiante, mago, héroe y asesino.
                    Ahora va a revelar la verdad sobre sí mismo. Y para ello debe empezar por el 
                    principio: su infancia en una troupe de artistas itinerantes, los años malviviendo
                    como un ladronzuelo en las calles de una gran ciudad y su llegada a una universidad
                    donde esperaba encontrar todas las respuestas que había estado buscando. 
                    «Viajé, amé, perdí, confié y me traicionaron.» «He robado princesas a reyes agónicos. 
                    Incendié la ciudad de Trebon. He pasado la noche con Felurian y he despertado vivo y
                    cuerdo. Me expulsaron de la Universidad a una edad a la que a la mayoría todavía no 
                    los dejan entrar. He recorrido de noche caminos de los que otros no se atreven a 
                    hablar ni siquiera de día. He hablado con dioses, he amado a mujeres y he escrito
                    canciones que hacen llorar a los bardos. »Me llamo Kvothe.
                    Quizá hayas oído hablar de mi.
                    ardos. »Me llamo Kvothe.
                    Quizá hayas oído hablar de mi.
                    En una posada en tierra de nadie, un hombre se dispone a relatar,
                    por primera vez, la auténtica historia de su vida. 
                    Una historia que únicamente él conoce y que ha quedado
                    diluida tras los rumores, las conjeturas y los cuentos de taberna 
                    que le han convertido en un personaje legendario a quien todos daban ya 
                    por muerto: Kvothe# músico, mendigo, ladrón, estudiante, mago, héroe y asesino.
                    Ahora va a revelar la verdad sobre sí mismo. Y para ello debe empezar por el 
                    principio: su infancia en una troupe de artistas itinerantes, los años malviviendo
                    como un ladronzuelo en las calles de una gran ciudad y su llegada a una universidad
                    donde esperaba encontrar todas las respuestas que había estado buscando. 
                    «Viajé, amé, perdí, confié y me traicionaron.» «He robado princesas a reyes agónicos. 
                    Incendié la ciudad de Trebon. He pasado la noche con Felurian y he despertado vivo y
                    cuerdo. Me expulsaron de la Universidad a una edad a la que a la mayoría todavía no 
                    los dejan entrar. He recorrido de noche caminos de los que otros no se atreven a 
                    hablar ni siquiera de día. He hablado con dioses, he amado a mujeres y he escrito
                    canciones que hacen llorar a los bardos. »Me llamo Kvothe.
                    Quizá hayas oído hablar de mi.
                </p>
                </div>
            </div>
            <?php } 
            ?>
        </div>

        

    </body>
    <footer>Este documento fue escrito en 2011.</footer>
</html>