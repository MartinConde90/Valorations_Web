<?php
$directorioImagenes = 'img';
$cambio = trim($_POST['titulo']);
$posicionPuntoExtension = strrpos($_FILES['imagen']['name'], '.');
$ext = strtolower(substr($_FILES['imagen']['name'], $posicionPuntoExtension));
$ubicacionImagen = $directorioImagenes . '/' . $cambio . $ext;

$dato = $_GET['tipo'];
$null = null;
$prep = $conexion->prepare('INSERT INTO elemento values(?,?,?,?,?,?,?,?,?,?,?);');
$prep->bind_param('isssssssssi', $null,$_GET['tipo'], $_POST['titulo'],$_POST['tituloO'],$_POST['saga'],$_POST['sinopsis'],$_POST['genero'],$_POST['subgenero'],$_POST['pais'],$ubicacionImagen,$_SESSION['codigousuario']);
$prep->execute(); 

$idElemento = $prep->insert_id;