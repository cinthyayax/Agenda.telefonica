<?php 
function fechaSimple() {
	return (date("d")."-".(date("n"))."-".date("Y"));
}

function horaSimple() {
	return (date("G").":".date("i"));
}

function fecha() {
	$dias = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	
	switch (date("D")) {
		case "Mon": $dia = 0; break;
		case "Tue": $dia = 1; break;
		case "Wed": $dia = 2; break;
		case "Thu": $dia = 3; break;
		case "Fri": $dia = 4; break;
		case "Sat": $dia = 5; break;
		case "Sun": $dia = 6; break;
	}
	
	return ('Ciudad de Guatemala, '.$dias[intval($dia)].' '.date("d").' de '.$meses[intval(date("n")-1)].' de '.date("Y"));
}

function imprimirMensaje($arr,$no,$alternativa) {
	if ( $no < count($arr) ){
		return $arr[$no];
	}else {
		return $alternativa;
	
	}
	
}

?>