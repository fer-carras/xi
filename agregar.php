<?php
include("php/conexion.php");
include("php/ValidarSesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xi</title>
    <link rel="stylesheet" href="css/xi.css">
</head>
<body>
    <header>
        <div id="logo">
            <img src="img/logo.jpg" width="150px">
        </div>
        <nav class="menu">
            <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="miperfil.php">Perfil</a></li>
            <li><a href="amigos.php">Mis Amigos</a></li>
            <li><a href="fotos.php">Fotos</a></li>
            <li><a href="agregar.php">Agregar  Amigos</a></li>
            <li><a href="php/CerrarSesion.php">CerrarSesion</a></li>
            </ul>
        </nav>
    </header>

    <section id="recuadros">
        <h2> Amigos </h2>

        <?php
        $consulta="Select * From persona P Where P.Nickname !='$nickname' and P.Nickname not in (Select A.Nickname2 From amistad A Where A.Nickname1='$nickname')";
        $datos=mysqli_query($conexion, $consulta);
        while($fila=mysqli_fetch_array($datos)){
        ?>
        <section class="recuadro">
            <img src="<?php echo $fila['FotoPerfil']?>" height="150">
            <h2> <?php echo $fila['Nombre']."". $fila['Apellidos']?> </h2>
            <p class="parrafo">
                <?php echo $fila['Descripcion']?>
            </p>
            <a href="<?php echo "perfilAmigo.php?nickname=". $fila['Nickname']?>" class="boton">Ver perfil </a><br><br>
            <a href="<?php echo "php/agregarAmigo.php?nickname=". $fila['Nickname']?>" class="boton">Agregar </a><br><br>
        </section>

        <?php
        } 
        ?>
 
    </section>
    <footer>
        <p>Copyright &copy; Xipatlani </p>
    </footer>
</body>
</html>
