<?php
session_start();

require_once 'mostrardatos.php';

?>

<!DOCTYPE html>
<html>
    <head>
    
    <meta charset="utf-8" name="viewport" content="widh=device-width,initial-scale=1.0">
        <title>Elemento</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <?php  
    
    $f = new comun();
   
    $f->comunD();
    $v = $f->dato;
    //echo $v;

    $n = new $v();
    
    $n->meterD();
    ?>
    
    <body>
        <?php
        include 'cabecera.php';
 
        ?>
        
        <table cellpadding="2" cellspacing="3" border-collapse="separate"; class="conjuntoE">
        <tr>
            <div style="margin-top: 140px";>
                <h1><?php $f->titulo();?></h1>
                
                
                
            </div>
            <td class="contenidoE">
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
                    <img src="<?php $f->Imagen();?>">
                </div>  
                <h2>Sinopsis:</h2>
                    
                    
                <p class="sinopsis">
                <?php $f->sinopsis();?>
                </p>
            </td>
            
            <td class="informacion">
                <?php
                $f->mostrarComun1();
                $n->mostrar();
                $f->mostrarComun2();
                ?>
            </td>
        </tr>
        <tr>
            <?php
                if(isset($_SESSION['nombreUsuario'])){ ?>
            <td class="comentarios">
                <input type="text" placeholder="Escribe algo para publicar">
                <div class="comentarioUsuario">
                <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                 when an unknown printer took a galley of type and scrambled it to make a type 
                 specimen book. It has survived not only five centuries, but also the leap into electronic 
                 typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release 
                 of Letraset sheets containing Lorem Ipsum passages, 
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                
                </div>
                <div class="comentarioUsuario">
                <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                 when an unknown printer took a galley of type and scrambled it to make a type 
                 specimen book. It has survived not only five centuries, but also the leap into electronic 
                 typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release 
                 of Letraset sheets containing Lorem Ipsum passages, 
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                
                </div>
                <div class="comentarioUsuario">
                <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                 when an unknown printer took a galley of type and scrambled it to make a type 
                 specimen book. It has survived not only five centuries, but also the leap into electronic 
                 typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release 
                 of Letraset sheets containing Lorem Ipsum passages, 
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                
                </div>
                </td>
            <?php } 
            ?>
        </tr>
        </table>

        

    </body>
    <footer>Este documento fue escrito en 2011.</footer>
</html>