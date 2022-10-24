<?php
require "Conexion.php";

$idFoto = $_GET['idFoto'];
$ruta = $_GET['ubicacion'];
$id = $_GET['idVehiculo'];

$sql = "DELETE FROM fotos WHERE idFotos = $idFoto";
$resultado = mysqli_query($Conexion, $sql);
if ($sql) {
    unlink($ruta);
    echo '<script>alert("foto Eliminado Correctamente"); window.location="frmActualizar.php?id=$id";</script>';
}

//header("Location: frmActualizar.php?idVehiculo=$idVehiculo");
?>

