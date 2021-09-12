<?php 	
	session_start();	
	include('conexion_bd.php');
	$sql = "INSERT INTO persona (primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,cod_depto) VALUES 
			('".$_REQUEST['primer_nombre']."','".$_REQUEST['segundo_nombre']."','".$_REQUEST['primer_apellido']."',
		     '".$_REQUEST['segundo_apellido']."','".$_POST['cod_depto']."')";
	if ($conn->query($sql) === TRUE) 
	{
		header("location: index.php?id=1&msg=m1&idReturn=5");
	} else 
	{		
		header("location: index.php?id=1&msg=e2&idReturn=5");		
	}	  
	$conn->close();	
?>