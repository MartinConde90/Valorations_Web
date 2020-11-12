

<?php
$loginCorrecto = false;
if(isset($_POST['enviar']) && $_POST['user'] != '' && $_POST['clave'] != '' && $_POST['email'] != '' && strlen($_POST['clave'])  >= 8){
    $usuario = $_POST['user'];
    $contraseña = $_POST['clave'];
    $email = $_POST['email'];

    $Informacion = array($usuario, $contraseña, $email);

    if(!is_dir('infoElemento'))
    mkdir('infoElemento');

    if(!is_file("infoElemento/usuario.txt")){
        $info[]= $Informacion;
        echo $info;
        $InfoElementos= json_encode($info);
        file_put_contents("infoElemento/usuario.txt", $InfoElementos);
    }
    else{
        $añadir = json_decode(file_get_contents("infoElemento/usuario.txt"), true);
        $añadir[]= $Informacion;
        $InfoElementos= json_encode($añadir);
        file_put_contents("infoElemento/usuario.txt", $InfoElementos);
    }

    $loginCorrecto = true;
    }
    
?>
<html>
	<head>
		<title>Registro</title>
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
            <div class="conjunto1"> 
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div class="contenedor">

                    <div class="logintxt">
                        <strong>Formulario de registro</strong>
                    </div>
                 
                    <label class="datos"><strong>Usuario:</strong></label>
                    <input class="input" type="text" name="user" required value="<?php if(isset($_POST['user'])) echo $_POST['user'];?>"placeholder="usuario1983">
                
                    <label class="datos"><strong>Email:</strong></label>
                    <input class="input" type="email" name="email" required value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" placeholder="ejemplo@hotmail.com">
                
                    <label class="datos"><strong>Contraseña:</strong></label> 
                    <input class="input" type="password" name="clave" required placeholder=" 8 o más caracteres">
                    
                    <input class="enviar" name="enviar" type="submit" value="Entrar">
                    
                </div>
			</form>
            </div>
		<?php endif; ?>
    </body> 
    <footer>Este documento fue escrito en 2011.</footer>
</html>