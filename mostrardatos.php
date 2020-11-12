<?php

class comun{ 
            public $codigo;
            public $TituloO;
            public $Titulo ;
            public $Genero ;
            public $Subgenero ;
            public $Pais ;
            public $Saga ;
            public $Sinopsis;
            public $Imagen;
            
            public $dato;

        public function comunD(){
            include 'conexion.php';
            $nombre = $_GET['nombreElemento'];
            $posicionBarra = strrpos($nombre, '/');
            $posicionPunto = strrpos($nombre, '.');
            
            if($posicionBarra == false){
                $nombre = substr($nombre, 0, $posicionPunto);
                
            }
            if($posicionBarra !== false){
                $nombre = substr($nombre, $posicionBarra + 1, $posicionPunto-$posicionBarra-1); //el segundo parametro es la longitud de cuantos caracteres tiene que coger
                
            }
            
            $prep = $conexion->prepare('SELECT * FROM elemento WHERE titulo = ?');
            $prep->bind_param('s', $nombre);
            
            $prep->execute();
            $resultado = $prep->get_result();
            $registro = $resultado->fetch_assoc();
            
            $this->codigo = $registro['codigo'];
            $this->Titulo = $registro['titulo'];
            $this->TituloO = $registro['titulo_Original'];
            $this->Genero = $registro['genero'];
            $this->Subgenero = $registro['subgenero'];
            $this->Pais = $registro['pais'];
            $this->Saga = $registro['saga'];
            $this->Sinopsis = $registro['sinopsis'];
            $this->Imagen = $registro['imagen'];
            $this->dato = $registro['dato'];
        }

        public function mostrarComun1(){
            ?>
                <h2>Título Original: <?php echo $this->TituloO;?></h2>
                
            <?php
        }

        public function mostrarComun2(){
            ?>
                <h2>Género: <?php echo $this->Genero;?></h2>
                <h2>Subgénero: <?php echo $this->Subgenero;?></h2>
                <h2>País: <?php echo $this->Pais;?></h2>
                <h2>Saga: <?php echo $this->Saga;?></h2>
            <?php
        }

        public function sinopsis(){
            
            echo $this->Sinopsis;
        }

        public function titulo(){
            
            echo $this->Titulo;
        }

        public function imagen(){
            
            echo $this->Imagen;
        }

    }

    class libro extends comun{
        public $Autor ;
        public $Editorial ;
        public $Fecha ;
        public $Paginas ;
    
        public function meterD(){
            include 'conexion.php';
            $this->comunD();
            $codigo = $this->codigo;
            //var_dump($codigo);
            $prep = $conexion->prepare('SELECT * FROM libro WHERE codigo_elemento = ?');
            $prep->bind_param('i', $codigo);
            $prep->execute();
            $resultado = $prep->get_result();
            $registro = $resultado->fetch_assoc();

            $this->Autor = $registro['autor'];
            $this->Editorial = $registro['editorial'];
            $this->Paginas = $registro['paginas'];
            $this->Fecha = $registro['fecha'];
        }

        public function mostrar(){
            ?>
            <h2>Autor: <?php echo $this->Autor;?></h2>
            <h2>Editorial: <?php echo $this->Editorial;?></h2>
            <h2>Fecha de publicación: <?php echo $this->Fecha;?></h2>
            <h2>Número de páginas: <?php echo $this->Paginas;?></h2>
            <?php
        }
    }

    class pelicula extends comun{
        public $Director ;
        public $Duracion ;
        public $Fecha ;
        public $Compositor ;
    
        public function meterD(){
            include 'conexion.php';
            $this->comunD();
            $codigo = $this->codigo;
            //var_dump($codigo);
            $prep = $conexion->prepare('SELECT * FROM pelicula WHERE codigo_elemento = ?');
            $prep->bind_param('i', $codigo);
            $prep->execute();
            $resultado = $prep->get_result();
            $registro = $resultado->fetch_assoc();

            $this->Director = $registro['director'];
            $this->Duracion = $registro['duracion'];
            $this->Compositor = $registro['compositor'];
            $this->Fecha = $registro['fecha'];
        }

        public function mostrar(){
            ?>
            <h2>Director: <?php echo $this->Director;?></h2>
            <h2>Duracion: <?php echo $this->Duracion;?></h2>
            <h2>Fecha de publicación: <?php echo $this->Fecha;?></h2>
            <h2>Compositor: <?php echo $this->Compositor;?></h2>
            <?php
        }
    }

    class juegos extends comun{
        public $Desarrollador ;
        public $Plataformas ;
        public $Fecha ;
        public $ModoJuego ;
    
        public function meterD(){
            include 'conexion.php';
            $this->comunD();
            $codigo = $this->codigo;
            //var_dump($codigo);
            $prep = $conexion->prepare('SELECT * FROM juegos WHERE codigo_elemento = ?');
            $prep->bind_param('i', $codigo);
            $prep->execute();
            $resultado = $prep->get_result();
            $registro = $resultado->fetch_assoc();

            $this->Desarrollador = $registro['desarrollador'];
            $this->Plataformas = $registro['plataformas'];
            $this->ModoJuego = $registro['modo_juego'];
            $this->Fecha = $registro['fecha'];
        }

        public function mostrar(){
            ?>
            <h2>Desarrollador: <?php echo $this->Desarrollador;?></h2>
            <h2>Plataformas: <?php echo $this->Plataformas;?></h2>
            <h2>Fecha de lanzamiento: <?php echo $this->Fecha;?></h2>
            <h2>Modo de juego: <?php echo $this->ModoJuego;?></h2>
            <?php
        }
    }