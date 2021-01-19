<?php
include ("conexion_bd.php");
session_start();
$id_a=$_GET['id_a'];
$nombre=$_GET['nombre'];
$b_alias=$_GET['alias'];
$id_u=0;
if ($b_alias==$_SESSION['alias']) {
	header("location:../vistas/agregar_albumc.php?nombre=".$nombre."&id_album=".$id_a);
}else{

$sql= "SELECT * FROM usuarios WHERE alias ='".$b_alias."'";

	$resultado= mysqli_query($con,$sql);
	$fila=mysqli_fetch_array($resultado);

if (!($fila['id'])) {
/*	echo "<script>alert(\"No se encontró\");</script>";
	header("location:../vistas/agregar_albumc.php?nombre=".$nombre."&id_album=".$id_a);*/
  		print "<script>alert(\"No se encontró el usuario\");window.location='../vistas/agregar_albumc.php?nombre=".$nombre."&id_album=".$id_a."';</script>";



}else{
	$id_u=$fila['id'];

$sql= "SELECT * FROM albumes_compartidos WHERE id_album ='$id_a' AND  id_usuario ='$id_u'";

	$resultado= mysqli_query($con,$sql);
	$fila=mysqli_fetch_array($resultado);

if ($fila['id_usuario']==$id_u) {
	/*echo "<script>alert(\"Ya lo tenías agregado\");</script>";
	header("location:../vistas/agregar_albumc.php?nombre=".$nombre."&id_album=".$id_a);
*/
		print "<script>alert(\"Ya tienes a este Usuario agregado\");window.location='../vistas/agregar_albumc.php?nombre=".$nombre."&id_album=".$id_a."';</script>";


}else{

$sql = "INSERT INTO albumes_compartidos (id_usuario,id_album,permisos)
  VALUES ('".$id_u."','".$id_a."',1)";


  if ($con->query($sql) === TRUE) {

		/*print "<script>alert(\"Usuario Agregado\");</script>";
		header("location:../vistas/agregar_albumc.php?nombre=".$nombre."&id_album=".$id_a);*/
		print "<script>alert(\"El usuario ha sido agregado\");window.location='../vistas/agregar_albumc.php?nombre=".$nombre."&id_album=".$id_a."';</script>";
  
    } else {
      echo "Error: " . $sql . "<br>" . $con->error;
    }
    }
}
}
?>