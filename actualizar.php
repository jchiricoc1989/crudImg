<?php
require "Conexion.php";     
//variables del formulario
$idVehiculo = $_POST['idVehiculo'];
$Marca = $_POST['Marca'];
$Linea = $_POST['Linea'];
$Modelo = $_POST['Modelo'];
//$img = $_POST['img'];

//echo $idVehiculo,$Marca,$Linea,$Modelo;
$sql2 = "UPDATE vehiculo SET Marca='$Marca', Linea='$Linea', Modelo='$Modelo' WHERE idVehiculo = $idVehiculo";
mysqli_query($Conexion,$sql2);



//cargamos el ultimo id insertado para poder insertar la imagen
$ultimoCodigoInsertado = mysqli_insert_id($Conexion);
//echo $ultimoCodigoInsertado;

// -------------------------ingresando las imagenes ----------------------------
//verificando el indice o espacio FILES
//por medio de nuestro ciclo FOREACH.
foreach ($_FILES["img"]["tmp_name"] as $key => $tmp_name) {

	$nombreImagen=$_FILES["img"]["name"][$key]; //RECOPILANDO NOMBRE ORIGINAL...
	$ubicacion=$_FILES["img"]["tmp_name"][$key]; //recopilando ubicacion actual(temporal) de la foto....
	
	$directorio="imagenes/"; //preparando ruta de salida....
	//verificamos que exista el directorio...
	//negamos la expresiÃ³n FILEEXIST para evitar dejar en blanco la parte afirmativa del IF, cuando no exista, creamos la carpeta..
	if (!file_exists($directorio)) {
		mkdir($directorio,0777) or die("No logramos crear carpeta");
	}

	$dir=opendir($directorio); //luego de verificar, en este punto, debe de existir la carpeta.... procedemos a abrirla.
	$ubicacionFinal=$directorio.$nombreImagen; //construyendo la ruta nueva (final) de imagen....
  
	//movemos la foto al servidor
	if (move_uploaded_file($ubicacion, $ubicacionFinal)) {
		$sql = "INSERT INTO fotos VALUES(null,'$idVehiculo','$ubicacionFinal')";
   		mysqli_query($Conexion, $sql);
		
	}else{
		echo "ERROR, INTENTE DE NUEVO";
	}

	closedir($dir); 	//cerrar carpeta...
}
//echo "Registro de vehiculo y fotos correctamente";
header("Location: index.php");


?>