

<?php
if(isset($_FILES['imagen'])){

    $directorioImagenes = 'img';
    if(!is_dir($directorioImagenes))
        mkdir($directorioImagenes);
    $cambio = trim($_POST['titulo']);
    $cambio = ucfirst($cambio);
    $posicionPuntoExtension = strrpos($_FILES['imagen']['name'], '.');
    $ext = strtolower(substr($_FILES['imagen']['name'], $posicionPuntoExtension));
    $ubicacionImagen = $directorioImagenes . '/' . $cambio . $ext;
    if($ext == '.png' || $ext == '.jpg' || $ext == '.jpeg' || $ext == '.gif'){
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ubicacionImagen);
    }

}
?>

<?php
$loginCorrecto = false;
if(isset($_POST['titulo']) && $_POST['tituloO'] != '' && $_POST['genero'] != '' 
    && $_POST['subgenero'] != '' && $_POST['autor']  != '' && $_POST['pais'] != '' 
    && $_POST['editorial'] != '' && $_POST['fecha']  != '' && $_POST['paginas']  != '' 
    && $_POST['saga']  != '' && $_POST['sinopsis']  != '' && $_POST['titulo']  != ''){
    $TituloO = ucfirst($_POST['tituloO']);
    $Titulo = ucfirst($_POST['titulo']);
    $Genero = ucfirst($_POST['genero']);
    $Subgenero = ucfirst($_POST['subgenero']);
    $Autor = ucfirst($_POST['autor']);
    $Pais = ucfirst($_POST['pais']);
    $Editorial = ucfirst($_POST['editorial']);
    $Fecha = ucfirst($_POST['fecha']);
    $Paginas = $_POST['paginas'];
    $Saga = ucfirst($_POST['saga']);
    $Sinopsis = ucfirst($_POST['sinopsis']);

    $Informacion = array($Titulo, $TituloO, $Genero, $Subgenero, $Autor, $Pais, $Editorial, $Fecha, $Paginas, $Saga, $Sinopsis, $ubicacionImagen);

    if(!is_dir('infoElemento'))
    mkdir('infoElemento');

    if(!is_file("infoElemento/info.txt")){
        $info[]= $Informacion;
        $InfoElementos= json_encode($info);
        file_put_contents("infoElemento/info.txt", $InfoElementos);
    }
    else{
        $añadir = json_decode(file_get_contents("infoElemento/info.txt"), true);
        $añadir[]= $Informacion;
        $InfoElementos= json_encode($añadir);
        file_put_contents("infoElemento/info.txt", $InfoElementos);
    }
    $loginCorrecto = true;
    }

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
        <?php if($loginCorrecto): 
            header("location: menu.php");
            ?>
		<?php else: ?>
            <div class="conjunto2"> 
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                <div class="contenedorS">
                    <div class="logintxt">
                        <strong>Nueva publicación</strong>
                    </div>


                    <label class="datos"><strong>Titulo:</strong></label>
                    <input class="input" type="text" name="titulo" required value="<?php if(isset($_POST['titulo'])) echo $_POST['titulo'];?>">

                    <label class="datos"><strong>Titulo Original:</strong></label>
                    <input class="input" type="text" name="tituloO" required value="<?php if(isset($_POST['tituloO'])) echo $_POST['tituloO'];?>">

                    <label class="datos"><strong>Género:</strong></label>
                    <input class="input" type="text" name="genero" required value="<?php if(isset($_POST['genero'])) echo $_POST['genero'];?>">

                    <label class="datos"><strong>Subgénero:</strong></label>
                    <input class="input" type="text" name="subgenero" required value="<?php if(isset($_POST['subgenero'])) echo $_POST['subgenero'];?>">

                    <label class="datos"><strong>Autor:</strong></label>
                    <input class="input" type="text" name="autor" required value="<?php if(isset($_POST['autor'])) echo $_POST['autor'];?>">

                    <label class="datos"><strong>País:</strong></label>
                    <input class="input" type="text" name="pais" required value="<?php if(isset($_POST['pais'])) echo $_POST['pais'];?>">
                    
                    <label class="datos"><strong>Editorial:</strong></label>
                    <input class="input" type="text" name="editorial" required value="<?php if(isset($_POST['editorial'])) echo $_POST['editorial'];?>">
                    
                    <label class="datos"><strong>Fecha de publicación:</strong></label>
                    <input class="input" type="date" name="fecha" required value="<?php if(isset($_POST['fecha'])) echo $_POST['fecha'];?>" placeholder="dd/mm/aa">
                    
                    <label class="datos"><strong>Número de páginas:</strong></label>
                    <input class="input" type="number" name="paginas" required value="<?php if(isset($_POST['paginas'])) echo $_POST['paginas'];?>">
                    
                    <label class="datos"><strong>Saga:</strong></label>
                    <input class="input" type="text" name="saga" required value="<?php if(isset($_POST['saga'])) echo $_POST['saga'];?>" placeholder="Nombre saga o 'No'">

                    <label class="datos"><strong>Sinopsis:</strong></label>
                    <textarea class="input" maxlength="1410" name="sinopsis" required value="<?php if(isset($_POST['sinopsis'])) echo $_POST['sinopsis'];?>"  placeholder="1410 caracteres máximo"></textarea>
                    
                    <input type="file" name="imagen" accept="image/*" required >

                    <input class="enviarS" type="submit" value="Subir">
                    
                </div>
			</form>
            </div>
		<?php endif; ?>
    </body> 
    <footer>Este documento fue escrito en 2011.</footer>
</html>