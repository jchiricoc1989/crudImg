<?php
require "Conexion.php";

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
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Linea</th>
                <th>Modelo</th>
                <th>Eliminar</th>
                <th>Actualizar</th>
            </tr>
        </thead>

        <tbody>
            <a href="frmVehiculo.php">Insertar Vehiculo</a>
            <?php
            $sql = "SELECT * FROM vehiculo";
            $resultado = mysqli_query($Conexion, $sql);
            while ($res = mysqli_fetch_assoc($resultado)) {
            ?>
                <tr>
                    <th><?php echo $res['idVehiculo']; ?></th>
                    <th><?php echo $res['Marca']; ?></th>
                    <th><?php echo $res['Linea']; ?></th>
                    <th><?php echo $res['Modelo']; ?></th>
                    <th><a href='eliminar.php?id=<?php echo $res['idVehiculo']; ?>'>Delete</a></th>
                    <th><a href='frmActualizar.php?id=<?php echo $res['idVehiculo']; ?>'>Update</a></th>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>