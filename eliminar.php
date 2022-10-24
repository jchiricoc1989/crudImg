<?php
require "Conexion.php";

$idVehiculo = $_GET['id'];

$elimiarF = "SELECT f.idFotos, f.idVehiculo,f.ubicacion, v.Marca, v.Linea,v.Modelo
            FROM vehiculo AS v, fotos AS f
            WHERE
            f.idVehiculo = v.idVehiculo AND
            v.idVehiculo = $idVehiculo";

$resultadoF = mysqli_query($Conexion, $elimiarF);
while ($resF = mysqli_fetch_assoc($resultadoF)) {
    $idFoto = $resF['idFotos'];
    $ruta = $resF['ubicacion'];

    //echo $ruta;
    $sql = "DELETE FROM fotos WHERE idVehiculo = $idVehiculo";
    $resultado = mysqli_query($Conexion, $sql);
    if ($sql) {
        unlink($ruta);
    }
}


$sql2 = "DELETE FROM vehiculo WHERE idvehiculo = $idVehiculo";
mysqli_query($Conexion, $sql2);

header("Location: index.php");

//echo $ruta;
//eliminar la foto

//$sql = "DELETE FROM fotos WHERE idVehiculo = $idVehiculo";
//$resultado = mysqli_query($Conexion, $sql);
//if ($sql) {
  //  unlink($ruta);
//}
