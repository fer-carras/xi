
<?php
include("ValidarSesion.php");

$ubicacion="../img/$nickname/perfil.png";
$archivo=$_FILES['archivo']['tmp_name'];

if(move_uploaded_file($archivo, $ubicacion)){
    echo "Elarchivo ha sido subido";
    header('Location:../miperfil.php');
}
else{
    echo "Ha ocurrido un error trate de nuevo";
    echo "<br><a href='../miperfil.php'> Volver.</a>";
}

?>