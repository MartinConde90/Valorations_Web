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

$prep = $conexion->prepare('SELECT contraseña, codigo, nombre FROM usuario WHERE nombre = ?');

$prep->bind_param('s', $_POST['user']);
$prep->execute();
$result = $prep->get_result();
if($registro = $result->fetch_array()){
    
    if(password_verify($_POST['clave'], $registro['contraseña']))
    {   session_start();
        $_SESSION['nombreUsuario'] = $registro['nombre'];
        $_SESSION['codigousuario'] = $registro['codigo'];
        $loginCorrecto = true;}
    else{
        echo 'La contraseña no es correcta';}
}
else{
    echo 'No se encuentra al usuario';
}    
    
/*
if(isset($_POST['enviar']) && $_POST['user'] != $usuario || $_POST['clave'] != $contraseña){
    $loginFallido = true;
    }
*/
?>
<html>
	<head>
		<title>Login</title>
        <meta charset="utf-8">
        <link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
        <div class="cabecera">
            <div class="logo"><a href="menu.php">El Pretencioso</a></div>
        </div>
       <?php
        
        if($loginCorrecto): 
            header("location: menu.php"); 

    //     elseif($loginFallido): ?>
         <!--       <div class="contenedor">
                <div class="logueado">Usuario o Contraseña incorrectos</div>
            </div>
    -->
		<?php else: ?>
            <div class="conjunto1"> 
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div class="contenedor">
                    <div class="logintxt">
                        <strong>Login</strong>
                    </div>
                  
                        <label class="datos"><strong>Usuario:</strong></label>
                        <input class="input" type="text" name="user" required value="<?php if(isset($_POST['user'])) echo $_POST['user'];?>">
                    
                        <label class="datos"><strong>Contraseña:</strong></label> 
                        <input class="input" type="password" name="clave" required>
                    
                    <input class="enviar" name="enviar" type="submit" value="Entrar">
                    
                </div>
			</form>
            </div>
		<?php endif; ?>
    </body> 
    <footer>Este documento fue escrito en 2011.</footer>
</html>