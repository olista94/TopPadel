
<?php
//Creamos la session
session_start();
//Destruimos la session
session_destroy();
//Redirige al index (nos mandara al login)
header('Location:../index.php');

?>
