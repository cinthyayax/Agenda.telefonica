<script type="text/javascript">
	var http = createRequestObject();

	function sndBuscarAgenda() 
	{
		http.open('get', 'back_busca_registrotelefono.php?nombre_filtro='+document.formulario.ingreso_buscar.value);
		http.onreadystatechange = handleResponseProveedor;
		http.send(null);    
	}
		function handleResponseProveedor() 
	{ /*0: not initialized. 1: connection etablished. 2: request received. 3: answer in process. 4: finished. */
    	if(http.readyState == 4)
		{
		  var response = http.responseText;
		  if (response == 'ninguno' )
		  {
			document.getElementById("datos").innerHTML = 'Sin Resultados...';
	   	  }else
		  {		  
			document.getElementById("datos").innerHTML = response;
		  }
		}
	}
</script>

<form name="formulario" id="formulario" action="">
    <table>
        <tr>
            <th colspan="3" align="center" ><h1>AGENDA TELEF&Oacute;NICA</h1></th>
        <tr>
        <tr>  
            <th width="150">Filtrar:</th>      
            <td width="250"><input type="text" name="ingreso_buscar" id="ingreso_buscar" style="width:350px;" onkeypress="sndBuscarAgenda()"></td>
            <td><input type="button" name="buscar" id="buscar" onClick="sndBuscarAgenda()" title="Buscar" value="Buscar"></td>
        </tr>                
    </table> 
</form>

<div id="datos">   
	<script type="text/javascript">
		sndBuscarAgenda();
	</script>
</div>