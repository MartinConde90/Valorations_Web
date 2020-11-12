<?php
    $loginCorrecto = false;
    $servidor =  'localhost';
    $usuario = 'root';
    $clave = '';
    $nombreBaseDatos = 'pagina';
    
    $conexion = new mysqli($servidor, $usuario, $clave, $nombreBaseDatos);
    
    if($conexion->connect_error){ //connect_error es un atributo propio de la case de mysqli
        die('No se ha podido conectar a la BD: ' . $conexion->connect_error);
    }
    
    $conexion->set_charset('utf8');
    
    $sql = $conexion->prepare('SELECT nombre
            FROM usuario
            where nombre = ?');
    
    $sql->bind_param('s', $_GET['usuario']);
    $sql->execute();
    $resultado = $sql->get_result();
   //sql buscar longitud

   if($resultado->num_rows == 1){
       echo json_encode(['res' => 1, 'texto' => "El nombre de usuario ya está en uso"]);
   }
   else{
       echo json_encode(['res' => 0, 'texto' => "Nombre de usuario valido"]);
   }
        
    


 