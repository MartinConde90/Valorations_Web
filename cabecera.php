<div class="cabecera">
                    <?php
                    if(isset($_GET['nombreElemento'])){?>
                    <div class="logo"><a href="menu.php">El Pretencioso</a></div>
                    <?php } 
                    else{?>
                    
                    <div class="logo">El Pretencioso</div>
                    <?php } ?>
                    <div class="registro">
                        <?php
                        if(isset($_SESSION['nombreUsuario'])){ ?>
                        <div class="subir">
                            <div id="slide">
                                <p style=" margin-top: 0; margin-bottom: 0;"><strong>+</strong></p>
                                <div class="desplegable">
                                    <ul id = "cambiar">
                                        <li><a href="subirPro.php?tipo=libro">Libros</a></li>
                                        <li><a href="subirPro.php?tipo=pelicula">Peliculas</a></li>
                                        <li><a href="subirPro.php?tipo=juegos">Juegos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a href="logout.php"><strong>Logout</strong></a>
                        <?php } 
                        else{?>
                        <a href="login.php"><strong>Login</strong></a>
                        / 
                        <a href="registrobd.php"><strong>Resgistrate</strong></a>
                        <?php } ?>
                    </div>
                </div>