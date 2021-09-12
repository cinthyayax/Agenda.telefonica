<?php 	
	session_start();	
	include('conexion_bd.php');
	$sql = "INSERT INTO cat_tipotelefono (des_tipo) VALUES ('".$_REQUEST['descripcion']."')";
	if ($conn->query($sql) === TRUE) 
	{
		header("location: index.php?id=1&msg=m1&idReturn=2");
	} else 
	{		
		header("location: index.php?id=1&msg=e2&idReturn=2");		
	}	  
	$conn->close();	
?>