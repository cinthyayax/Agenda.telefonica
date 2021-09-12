<script type="text/javascript">
	var http = createRequestObject();

	function sndBuscar() 
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
	
	function validar()
	{
		A = vacio(document.formulario.cod_persona.value);				
		if (A ==true)
		{
            B = vacio(document.formulario.cod_tipo.value);			
			if (B ==true)
			{
				C = vacio(document.formulario.num_telefono.value);			
                if (C ==true)
                {
                    proceso_crea();
                }else
                {
                    alert('Debe ingresar un numero telefonico');
                }
			}else
			{
				alert('Debe seleccionar el tipo de telefono');
			}
		}else
		{
			alert('Debe seleccionar la persona');
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

<h1>Registro de tel&eacutefono por persona</h1>

<form name="formulario" id="formulario" method="post" action="back_crea_registrotelefono.php">
	<table style="background:#FFFFCC">

    <tr>        	
            <th width="150">Persona:</th>
            <td width="250">
                <?php
                    include ('conexion_bd.php');                                    
                    $sql = "SELECT cod_persona, primer_nombre, primer_apellido FROM persona ORDER BY primer_nombre, primer_apellido";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {    
                        echo '<select name="cod_persona" id="cod_persona" style="width:355px; height:25px;">';
						echo '<option value=""><-- CAMPO DE SELECCI&Oacute;N --></option>';                  
                        // output data of each row
                        while($row = $result->fetch_assoc()) 
                        {			
                            echo '<option value='.$row["cod_persona"].'>'.$row["primer_nombre"].' '.$row["primer_apellido"].'</option>';
                        }
                        echo '</select>';
                    }
                    $conn->close();    
                ?>
            </td>
        </tr>

        <tr>        	
            <th width="150">Tipo tel&eacutefono:</th>
            <td width="250">
                <?php
                    include ('conexion_bd.php');                                    
                    $sql = "SELECT cod_tipo, des_tipo FROM cat_tipotelefono ORDER BY des_tipo";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {    
                        echo '<select name="cod_tipo" id="cod_tipo" style="width:355px; height:25px;">';
						echo '<option value=""><-- CAMPO DE SELECCI&Oacute;N --></option>';                  
                        // output data of each row
                        while($row = $result->fetch_assoc()) 
                        {			
                            echo '<option value='.$row["cod_tipo"].'>'.$row["des_tipo"].'</option>';
                        }
                        echo '</select>';
                    }
                    $conn->close();    
                ?>
            </td>
        </tr>
  
        <tr>        	
            <th width="150">Empresa Telef&oacutenica:</th>
            <td width="250">
                <?php
                    include ('conexion_bd.php');                                    
                    $sql = "SELECT cod_empresa, des_empresa FROM cat_tipoempresa ORDER BY des_empresa";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {    
                        echo '<select name="cod_empresa" id="cod_empresa" style="width:355px; height:25px;">';
						echo '<option value=""><-- CAMPO DE SELECCI&Oacute;N --></option>';                  
                        // output data of each row
                        while($row = $result->fetch_assoc()) 
                        {			
                            echo '<option value='.$row["cod_empresa"].'>'.$row["des_empresa"].'</option>';
                        }
                        echo '</select>';
                    }
                    $conn->close();    
                ?>
            </td>
        </tr>


        <tr>        	
            <th width="150">N&uacutemero de telefono:</th>
            <td width="250"><input type="text" maxlength="75" name="num_telefono" id="num_telefono" style="width:350px"></td>
        </tr>  
        <tr>        	
            <th width="150">N&uacutemero de extension:</th>
            <td width="250"><input type="text" maxlength="75" name="des_extension" id="des_extension" style="width:350px"></td>
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

