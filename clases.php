<?php
session_start();
class elemento{ 
        public function formularioIni(){

                ?>
                    <label class="datos"><strong>Titulo:</strong></label>
                    <input class="input" type="text" name="titulo" required value="<?php if(isset($_POST['titulo'])) echo $_POST['titulo'];?>">

                    <label class="datos"><strong>Titulo Original:</strong></label>
                    <input class="input" type="text" name="tituloO" required value="<?php if(isset($_POST['tituloO'])) echo $_POST['tituloO'];?>">
                <?php
        }

        public function formularioFin(){
            
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
            
                <label class="datos"><strong>Género:</strong></label>
                <input class="input" type="text" name="genero" required value="<?php if(isset($_POST['genero'])) echo $_POST['genero'];?>">

                <label class="datos"><strong>Subgénero:</strong></label>
                <input class="input" type="text" name="subgenero" required value="<?php if(isset($_POST['subgenero'])) echo $_POST['subgenero'];?>">

                <label class="datos"><strong>País:</strong></label>
                <input class="input" type="text" name="pais" required value="<?php if(isset($_POST['pais'])) echo $_POST['pais'];?>">
                
                <label class="datos"><strong>Saga:</strong></label>
                <input class="input" type="text" name="saga"  value="<?php if(isset($_POST['saga'])) echo $_POST['saga'];?>" placeholder="Nombre saga o 'No'">

                <label class="datos"><strong>Sinopsis:</strong></label>
                <textarea class="input" maxlength="1410" name="sinopsis" required value="<?php if(isset($_POST['sinopsis'])) echo $_POST['sinopsis'];?>"  placeholder="1410 caracteres máximo"></textarea>
                
                <input type="file" name="imagen" accept="image/*" required >

                <input class="enviarS" type="submit" name="enviar" value="Subir">

            <?php
}}
        

class libro extends elemento{
    function libro(){   
        include 'conexion.php';
        
        
        $this->formularioIni();  
        $null = NULL;
        if(isset($_POST['enviar'])){
        
        include 'subirelemento.php';

        $lib = $conexion->prepare('INSERT INTO libro values(?,?,?,?,?,?);');
        $lib->bind_param('issisi', $null, $_POST['autor'],$_POST['editorial'],$_POST['paginas'],$_POST['fecha'],$idElemento);
        $lib->execute(); 
        
        header("location: menu.php");
         }
        ?>
       
        <label class="datos"><strong>Autor:</strong></label>
        <input class="input" type="text" name="autor" required value="<?php if(isset($_POST['autor'])) echo $_POST['autor'];?>">

        <label class="datos"><strong>Editorial:</strong></label>
        <input class="input" type="text" name="editorial" required value="<?php if(isset($_POST['editorial'])) echo $_POST['editorial'];?>">
        
        <label class="datos"><strong>Número de páginas:</strong></label>
        <input class="input" type="number" name="paginas" required value="<?php if(isset($_POST['paginas'])) echo $_POST['paginas'];?>">

        <label class="datos"><strong>Fecha de publicación:</strong></label>
        <input class="input" type="date" name="fecha" required value="<?php if(isset($_POST['fecha'])) echo $_POST['fecha'];?>" placeholder="dd/mm/aa">
        <?php
         $this->formularioFin();
         
            
}}

class pelicula extends elemento{
    function pelicula(){
        include 'conexion.php';

        $this->formularioIni();
        $null = NULL;
        if(isset($_POST['enviar'])){
        
        include 'subirelemento.php';

        
        $pel = $conexion->prepare('INSERT INTO pelicula values(?,?,?,?,?,?);');
        $pel->bind_param('isissi', $null, $_POST['director'],$_POST['duracion'],$_POST['compositor'],$_POST['fecha'],$idElemento);
        $pel->execute();

        $guardarId = $pel->insert_id;

        $act = $conexion->prepare('INSERT INTO actores values(?,?);');
        $act->bind_param('is', $null, $_POST['actores']);
        $act->execute();
        
        $lastId = $act->insert_id;

        $pa = $conexion->prepare('INSERT INTO peliculaactores values(?,?,?);');
        $pa->bind_param('iii', $null, $guardarId, $lastId);
        $pa->execute();

         
        
        header("location: menu.php");
         }
         ?>

        <label class="datos"><strong>Director:</strong></label>
        <input class="input" type="text" name="director" required value="<?php if(isset($_POST['director'])) echo $_POST['director'];?>">

        <label class="datos"><strong>Compositor:</strong></label>
        <input class="input" type="text" name="compositor" required value="<?php if(isset($_POST['compositor'])) echo $_POST['compositor'];?>">

        <label class="datos"><strong>Actores:</strong></label>
        <input class="input" type="text" name="actores" required value="<?php if(isset($_POST['actores'])) echo $_POST['actores'];?>">
        
        <label class="datos"><strong>Duración:</strong></label>
        <input class="input" type="number" name="duracion" required value="<?php if(isset($_POST['duracion'])) echo $_POST['duracion'];?>">

        <label class="datos"><strong>Fecha de estreno:</strong></label>
        <input class="input" type="date" name="fecha" required value="<?php if(isset($_POST['fecha'])) echo $_POST['fecha'];?>" placeholder="dd/mm/aa">
        
        <?php       
        $this->formularioFin();
}}

class juegos extends elemento{
    function juegos(){ 
        include 'conexion.php';

        $this->formularioIni();

        $null = NULL;
        if(isset($_POST['enviar'])){
        
        include 'subirelemento.php';

        $jue = $conexion->prepare('INSERT INTO juegos values(?,?,?,?,?,?);');
        $jue->bind_param('issssi', $null, $_POST['desarrollador'],$_POST['plataforma'],$_POST['modo_juego'],$_POST['fecha'],$idElemento);
        $jue->execute(); 
        
        header("location: menu.php");
         }
        ?>

        <label class="datos"><strong>Desarrollador:</strong></label>
        <input class="input" type="text" name="desarrollador" required value="<?php if(isset($_POST['desarrollador'])) echo $_POST['desarrollador'];?>">

        <label class="datos"><strong>Plataforma:</strong></label>
        <input class="input" type="text" name="plataforma" required value="<?php if(isset($_POST['plataforma'])) echo $_POST['plataforma'];?>">
        
        <label class="datos"><strong>Modo juego:</strong></label>
        <input class="input" type="text" name="modo_juego" required value="<?php if(isset($_POST['modo_juego'])) echo $_POST['modo_juego'];?>">

        <label class="datos"><strong>Fecha de lanzamiento:</strong></label>
        <input class="input" type="date" name="fecha" required value="<?php if(isset($_POST['fecha'])) echo $_POST['fecha'];?>" placeholder="dd/mm/aa">

        <?php
        $this->formularioFin();
}}