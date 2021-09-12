<script type="text/javascript">
	var http = createRequestObject();

	function sndBuscar() 
	{
		http.open('get', 'back_busca_departamentopersona.php?nombre_filtro='+document.formulario.ingreso_buscar.value);
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
	
	function validar()
	{
		A = vacio(document.formulario.descripcion.value);
				
		if (A ==true)
		{
			proceso_crea();
		}else
		{
			alert('Debe ingresar la descripcion');
		}					
	}
	
	function vacio(q) 
	{   
        for ( i = 0; i < q.length; i++ )
		{   
		   if ( q.charAt(i) != " " ) 
		   {   
		       return true   
            }   
        }   
        return false                
	} 
	
	function proceso_crea()
	{
		c=window.confirm("Esta seguro de realizar este proceso...?");
		if (c==true)
		{ 
			document.formulario.submit();		
		}
		if (c==false)
		{
			alert ('Proceso cancelado !!!');
		}
	}
</script>

<h1>Cat&aacutelogo: Tipo de Departamento</h1>

<form name="formulario" id="formulario" method="post" action="back_crea_departamentopersona.php">
	<table border="0" style="background:#FFFFCC">
    	<tr>        	
            <th width="150">Descripci&oacute;n:</th>
            <td width="250"><input type="text" maxlength="75" name="descripcion" id="descripcion" style="width:350px"></td>            
        </tr>
		<tr>
			<td><input type="button" name="guardar" id="guardar" onClick="validar()" title="Crear registro" value="Guardar"></td>
		</tr>
    </table>
    <p>&nbsp;</p>

  <table>
    <tr>  
		<th width="150">Filtrar:</th>      
        <td width="250"><input type="text" name="ingreso_buscar" id="ingreso_buscar" style="width:350px;" onkeypress="sndBuscar()"></td>
        <td><input type="button" name="buscar" id="buscar" onClick="sndBuscar()" title="Buscar" value="Buscar"></td>
    </tr>                
  </table>

</form>

<h2 align="center">Registros Creados</h2>

<div id="datos">
	<script type="text/javascript">
		sndBuscar();
	</script>
</div>

