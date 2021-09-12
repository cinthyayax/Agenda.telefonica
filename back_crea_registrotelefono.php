<?php 	
	session_start();	
	include('conexion_bd.php');
	$sql = "INSERT INTO registro_personatelefono (num_telefono,cod_persona,cod_tipo,cod_empresa, des_extension) VALUES 
			('".$_REQUEST['num_telefono']."','".$_REQUEST['cod_persona']."','".$_REQUEST['cod_tipo']."',
		     '".$_REQUEST['cod_empresa']."','".$_POST['des_extension']."')";
	if ($conn->query($sql) === TRUE) 
	{
		header("location: index.php?id=1&msg=m1&idReturn=6");
	} else 
	{		
		header("location: index.php?id=1&msg=e2&idReturn=6");		
	}	  
	$conn->close();	
?>