<?php
$id = $_POST['id'];
$id_album=$_GET['id_album'];
$nombre=$_GET["nombre"];
$bd_host = "localhost";
$bd_nombre = "album_fotografico";
$bd_usuario = "root";
$bd_contrasena = "";
$conexion = mysqli_connect($bd_host, $bd_usuario, $bd_contrasena, $bd_nombre); //conexion con bd
if (mysqli_connect_errno()) {
    //echo "error al conectar con la base de datos";
}

$tabla_bd = "album";
$consulta = "update album set nombre='$nombre' where id=$id_album";
echo json_encode($consulta);

$resultado = mysqli_query($conexion, $consulta);
$fotos;
$contfotos = 0;
if ($resultado == false) {
} else {
    echo json_encode("Editado");
}

mysqli_close($conexion);

?>