<?php
include("conexion.php");
session_start();

$_SESSION['login']=false;

//recibir y guardar datos enviados desde el formulario
$nickname=$_POST["nickname"];
$password=$_POST["contraseña"];

//Evaluar nickname enviado
$consulta="SELECT * FROM persona WHERE Nickname='$nickname'";
$consulta=mysqli_query($conexion,$consulta);
$consulta=mysqli_fetch_array($consulta);

if($consulta)
{
    if(password_verify($password, $consulta['Password']))
    {
        $_SESSION['login']=true;
        $_SESSION['nickname']=$consulta['Nickname'];
        $_SESSION['nombre']=$consulta['Nombre'];
        $_SESSION['apellidos']=$consulta['Apellidos'];
        $_SESSION['edad']=$consulta['Edad'];
        $_SESSION['descripcion']=$consulta['Descripcion'];
        $_SESSION['fotoPerfil']=$consulta['FotoPerfil'];

        header('Location:../miperfil.php');//redireccionar la pagina
    }
    else{
        echo"Contraseña Incorrecta";
        echo"<br> <a href='../index.html'>Intentelo de nuevo.</a>";
    }
}
else{
    echo "El usuario no existe!! :c";
    echo "<br><a href='../index.html'>Intentelo de nuevo.</a>";

}
?>