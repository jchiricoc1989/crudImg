<?php
require "Conexion.php";

$idVehiculo = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1> actualizar y eliminar foto</h1>
    <form action="actualizar.php" method="post" enctype="multipart/form-data">

        <?php
        $sql2 = "SELECT * FROM vehiculo WHERE idVehiculo = $idVehiculo";
        $respuesta2 = mysqli_query($Conexion, $sql2);
        while ($res2 = mysqli_fetch_assoc($respuesta2)) {
        ?>

            <label for="">Marca:</label>
            <input type="text" name="Marca" value="<?php echo $res2['Marca']; ?>" placeholder="Marca"><br><br>
            <input type="hidden" name="idVehiculo" value="<?php echo $idVehiculo ?>">
            <label for="">Linea:</label>
            <input type="text" name="Linea" value="<?php echo $res2['Linea']; ?>" placeholder="Linea"><br><br>
            <label for="">Modelo:</label>
            <input type="text" name="Modelo" value="<?php echo $res2['Modelo']; ?>" placeholder="Modelo"><br><br>
        
        <?php
        }
        ?>

        <label for="">Ingresar fotos:</label>
        <input type="file" name="img[]" multiple="" accept="image/*"><br><br>

        <?php
        $sql = "SELECT * FROM fotos WHERE idVehiculo = $idVehiculo";
        $respuesta = mysqli_query($Conexion, $sql);
        while ($res = mysqli_fetch_assoc($respuesta)) {
        ?>
            <img src="<?php echo $res['ubicacion'] ?>" alt="" width="150" height="150">
            <a href="eliminarFotoId.php?idFoto=<?php echo $res['idFotos']; ?>&ubicacion=<?php echo $res['ubicacion']; ?>&id=<?php echo $idVehiculo ?>">&times;</a>
        <?php
        }
        ?><br><br>
        <input type="submit" value="Actualizar" name="Actualizar">
    </form>
    <a href="index.php">atras</a>



</body>

</html>