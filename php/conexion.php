<?php
$servidor= "localhost";
$usuario="root";
$contrasena="";
$DB="redsocialio";

$conexion=mysqli_connect($servidor, $usuario,$contrasena, $DB);

if(!$conexion){
    echo "Fallo laconexión ";
    die("Connection failed".mysqli_connect_error());
}
else{
   // echo "Conexion exitosa";
}
?>