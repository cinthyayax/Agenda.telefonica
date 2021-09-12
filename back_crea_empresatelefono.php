<?php 	
	include('conexion_bd.php');
	$sql = "INSERT INTO cat_tipoempresa (des_empresa) VALUES ('".$_REQUEST['des_empresa']."')";
	if ($conn->query($sql) === TRUE) 
	{
		header("location: index.php?id=1&msg=m1&idReturn=3");
	} else 
	{		
		header("location: index.php?id=1&msg=e2&idReturn=3");		
	}	  
	$conn->close();	
?>