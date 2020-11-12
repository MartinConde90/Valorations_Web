

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

$sql = 'SELECT codigo, nombre, email, contraseña 
        FROM usuario';

$resultado = $conexion->query($sql);

    $codigo = NULL;
    $nombre = '';
    $email = '';
    $contraseña = '';

    if(isset($_POST['enviar'])) 
                {   
                    $nombre = $_POST['user'];
                    $email = $_POST['email'];
                    $contraseña = $_POST['clave'];  
                    $contraseñaEnc = password_hash($contraseña, PASSWORD_DEFAULT);
                    $sql = $conexion->prepare('INSERT INTO usuario VALUES(?,?,?,?);');
                    $sql->bind_param("isss", $codigo,$nombre, $email, $contraseñaEnc);
                    $sql->execute(); 
                    $conexion->close();
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
            <form autocomplete="off" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div class="contenedor">

                    <div class="logintxt">
                        <strong>Formulario de registro</strong>
                    </div>
                 
                    <label class="datos"><strong>Usuario:</strong></label>
                    <div id="comprobar">
                    <input class="input" type="text" name="user" id="user" required autofocus value="<?php if(isset($_POST['user'])) echo $_POST['user'];?>"placeholder="usuario1983">
                    </div>
                    <label class="datos"><strong>Email:</strong></label>
                    <input class="input" type="email" name="email" required autofocus value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" placeholder="ejemplo@hotmail.com">
                
                    <label class="datos"><strong>Contraseña:</strong></label> 
                    <input class="input" type="password" name="clave" required placeholder=" 8 o más caracteres" autofocus>
                    
                    <input class="enviar" name="enviar" id="bloquea" type="submit" value="Entrar">
                    
                </div>
			</form>
            </div>
        <?php endif; ?>
        
        <script>
            let inputUsuario = document.getElementById('user');
            inputUsuario.onkeyup = function(){
                        
                            let peticion = new XMLHttpRequest();
                            peticion.open('GET', 'ajax1.php?usuario=' + inputUsuario.value); /*con open le pedidmos mediante GET, que se conecte a esa pagina*/
                            peticion.send();
                        
                            peticion.onreadystatechange = function(){
                                if(this.readyState == 4){
                                    if(this.status == 200){
                                        let datos = JSON.parse(this.responseText); //decodificamos
                                        
                                        let alerta = document.getElementById('comprobar');
                                        if(document.getElementById('parrafo_alerta')) //si existe, lo borro
                                            document.getElementById('parrafo_alerta').remove();
                                        let crea = document.createElement('p'); /
                                        crea.id = 'parrafo_alerta';
                                        
                                        if(datos['res'] == 1){
                                            
                                            crea.innerText = datos['texto'];
                                            crea.style.color = "red";
                                            alerta.append(crea);
                                            
                                            
                                            document.getElementById("bloquea").disabled = true;
                                        }
                                        else{
                                            document.getElementById("bloquea").disabled = false;
                                        }
                                    }
                                }
                            };
                        };

            //El evento se lanza cuando el usuario suelta la tecla pulsada
            //document.getElementById('cajaBusqueda').onkeyup(function(){});
        </script>
    </body> 
    <footer>Este documento fue escrito en 2011.</footer>
</html>