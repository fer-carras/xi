<?php
include("conexion.php");
include("ValidarSesion.php");

$nicknameA= $_GET['nickname'];

$consulta="INSERT INTO amistad (Nickname1, Nickname2) VALUES ('$nickname', '$nicknameA')";

if(mysqli_query($conexion, $consulta)){
    $consulta="INSERT INTO amistad (Nickname1, Nickname2) VALUES ('$nicknameA', '$nickname')";
    if(mysqli_query($conexion, $consulta)){
        echo "Ahora tienes un nuevo amigo owo";
        header('Location: ../agregar.php');
    }
    else{
        echo "error";
        echo "<a href='../agregar.php'> volver </a>";
    }
}
else{
    echo "error";
    echo "<a href='../agregar.php'> volver </a>";
}
?>