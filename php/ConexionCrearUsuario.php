<?php
include("conexion.php");
//datosdel formulario
$nickname=$_POST["nickname"];
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$edad=$_POST["edad"];
$descripcion=$_POST["descripcion"];
$email=$_POST["email"];
$password=$_POST["password"];
//Encriptar el valor
$passwordHash=password_hash($password, PASSWORD_BCRYPT); //Para encriptar
$fotoPerfil="img/$nickname/perfil.png"; 
//Evaluamos si el nickname ingresado ya existe
$consultaId="SELECT Nickname FROM persona WHERE Nickname='$nickname'";
$consultaId=mysqli_query($conexion, $consultaId);// devuelve un objeto con false si hay error,true si se ejecuta
$consultaId=mysqli_fetch_array($consultaId);//Devuelve un array o NULL
if(!$consultaId){ //si esta vacia agregamos un nuevo usuario
    $sql="INSERT INTO persona VALUES ('$nickname', '$nombre', '$apellidos', '$edad', '$descripcion', '$fotoPerfil','$email', '$passwordHash')";
    //Ejecutamos y vemos si se guardan los datos
    if(mysqli_query($conexion,$sql)){
        mkdir("../img/$nickname"); //crea una carpeta en imagenes para el usuario
        copy("../img/x.jpg","../img/$nickname/perfil.png");

        echo "Tu cuenta ha sido creada.";
        echo "<br> <a href='../index.html'>Iniciar sesion</a>";
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conexion);
    }
}
else{
    echo "El nombre de usuario ya existe.";
    echo "<br> <a href='index.html'>Intentelo de nuevo.</a>";
}
?>