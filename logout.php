<?php 
session_start();
session_destroy();

//unset($_SESSION['usuarioLogueado']); //Solo me cargo el indice usuarioLoguado

header("location: menu.php");