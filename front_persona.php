<script type="text/javascript">
	var http = createRequestObject();

	function sndBuscar() 
	{
		http.open('get', 'back_busca_persona.php?nombre_filtro='+document.formulario.ingreso_buscar.value);
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
		A = vacio(document.formulario.primer_nombre.value);				
		if (A ==true)
		{
			B = vacio(document.formulario.primer_apellido.value);				
			if (B ==true)
			{
				proceso_crea();
			}else
			{
				alert('Debe ingresar el primer apellido');
			}
		}else
		{
			alert('Debe ingresar el primer nombre');
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

<h1>Cat&aacutelogo: Personas</h1>

<form name="formulario" id="formulario" method="post" action="back_crea_persona.php">
	<table style="background:#FFFFCC">
    	<tr>        	
            <th width="150">Primer nombre:</th>
            <td width="250"><input type="text" maxlength="75" name="primer_nombre" id="primer_nombre" style="width:350px"></td>
        </tr>   
        <tr>        	
            <th width="150">Segundo nombre:</th>
            <td width="250"><input type="text" maxlength="75" name="segundo_nombre" id="segundo_nombre" style="width:350px"></td>
        </tr>  
        <tr>        	
            <th width="150">Primer apellido:</th>
            <td width="250"><input type="text" maxlength="75" name="primer_apellido" id="primer_apellido" style="width:350px"></td>
        </tr>   
        <tr>        	
            <th width="150">Segundo apellido:</th>
            <td width="250"><input type="text" maxlength="75" name="segundo_apellido" id="segundo_apellido" style="width:350px"></td>
        </tr>  
        <tr>        	
            <th width="150">Departamento:</th>
            <td width="250">
                <?php
                    include ('conexion_bd.php');                                    
                    $sql = "SELECT cod_depto, des_depto FROM cat_departamento ORDER BY des_depto";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {    
                        echo '<select name="cod_depto" id="cod_depto" style="width:355px; height:25px;">';
						echo '<option value=""><-- CAMPO DE SELECCI&Oacute;N --></option>';                  
                        // output data of each row
                        while($row = $result->fetch_assoc()) 
                        {			
                            echo '<option value='.$row["cod_depto"].'>'.$row["des_depto"].'</option>';
                        }
                        echo '</select>';
                    }
                    $conn->close();    
                ?>
            </td>
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

