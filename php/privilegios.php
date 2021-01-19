
<?php
include ("conexion_bd.php");

$id_u=$_GET['id_u'];
$id_a=$_GET['id_a'];
$permiso=$_GET["permisos"];
$nombre=$_GET['nombre'];

	
$sq = "UPDATE  albumes_compartidos  SET permisos ='$permiso' WHERE id_usuario='$id_u' AND id_album=".$id_a;
	

	 if ($con->query($sq) === TRUE) {
	 	echo "funciono";
	 } else {
      echo "Error: " . $sq . "<br>" . $con->error;
    }


	
	if($res!=null){
		print "<script>alert('Privilegios actualizados exitosamente');
		window.location='../vistas/agregar_albumc.php?nombre=".$nombre."&id_album=".$id_a."';</script>";

	}else{
		print "<script>alert(\"No se pudo actualizar el privilegio.\");</script>";

		header("location:../vistas/agregar_albumc.php?nombre=".$nombre."&id_album=".$id_a);
	}

?>