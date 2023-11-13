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
        <h2>Mis Fotos</h2>
        <h3><form action="php/SubirFoto.php" method="post" enctype="multipart/form-data">
            Añadir Imagen: <input type="file" name="archivo" id="archivo" accept=".jpeg,.png,.jpg" required>
            <input type="submit" name="subir" value="Subir">
        </form></h3>
        <?php
        $consulta="Select * From fotos F Where F.Nickname='$nickname' Limit 3";
        $datos=mysqli_query($conexion, $consulta);
        while($fila=mysqli_fetch_array($datos)){
        ?>

        <section class="recuadro">
        <img src="<?php echo $fila['NombreFotos']?>" height="200" width="280">
    </section>
    <?php
        } 
    ?>
<footer>
        <p>Copyright &copy; Xipatlani </p>
    </footer>
</body>
</html>