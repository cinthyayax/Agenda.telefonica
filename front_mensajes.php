<?php

//editar mensajes 
$msg_arr= array('0',
'Datos grabados satisfactoriamente...'
);

//editar errores
$error_arr= array('0',//0
'Error de conexion en la base de datos',//1
'Error al crear el registro'//2
);

$alternativa = 'Codigo de mensaje invalido';

//----------------------------------------------------------------------------

	if ( isset($_REQUEST['idReturn'])) {

		$idReturn = $_REQUEST['idReturn'];
		echo '<p>&nbsp;</p><a href="index.php?id='.$idReturn.'">Regresar</a><p>&nbsp;</p>';
	}else{

		$idReturn ='';	
		echo '<p>&nbsp;</p><a href="index.php">Regresar</a><p>&nbsp;</p>';
	}

	if( isset($_REQUEST['msg']) ) {
		$msg = $_REQUEST['msg'];
		$opc = substr($msg,1);		
		if ($msg{0} == 'm'){
			
			echo '<h2 class="mensaje">'.imprimirMensaje($msg_arr,$opc,$alternativa).'</h2>';
			
		}else if ($msg{0} == 'e'){
		
			echo '<h2 class="error">'.imprimirMensaje($error_arr,$opc,$alternativa).'</h2>';
			
		}		
	}

?>