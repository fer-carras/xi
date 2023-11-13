<?php
session_start();//inicia una nueva sesion o reanudar una existente
$login=$_SESSION['login'];

if(!$login)
{
    hearder('Location:../index.html');
}
else{
    $nickname=$_SESSION['nickname'];
}
?>