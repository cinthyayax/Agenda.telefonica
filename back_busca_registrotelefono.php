<?php
	include ('conexion_bd.php');
	$filtro = $_REQUEST['nombre_filtro'];
	
	if ($filtro == "")
	{
		$filtro = "%%";
	}
	$sql = "SELECT a.cod_persona, b.primer_nombre, b.primer_apellido, a.num_telefono, a.des_extension, a.cod_tipo, c.des_tipo
				  ,a.cod_empresa, d.des_empresa		  
			 FROM registro_personatelefono AS a 
			 LEFT JOIN persona AS b
			        ON a.cod_persona = b.cod_persona
			LEFT JOIN cat_tipotelefono AS c
			        ON a.cod_tipo = c.cod_tipo
			LEFT JOIN cat_tipoempresa AS d
			        ON a.cod_empresa = d.cod_empresa
		    WHERE a.cod_persona      LIKE '%".$filtro."%'
			   OR b.primer_nombre    LIKE '%".$filtro."%'
			   OR b.primer_apellido  LIKE '%".$filtro."%'
			   OR a.num_telefono	 LIKE '%".$filtro."%'
			   OR a.des_extension	 LIKE '%".$filtro."%'
			   OR a.cod_tipo	 	 LIKE '%".$filtro."%'
			   OR c.des_tipo	 	 LIKE '%".$filtro."%'
			   OR a.cod_empresa	 	 LIKE '%".$filtro."%'
			   OR d.des_empresa	 	 LIKE '%".$filtro."%'
			";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		$detalle = '<table>
						<tr>							
							<th align="center"><strong>CODIGO DE PERSONA</strong></th>	
							<th align="center"><strong>NOMBRE DE PERSONA</strong></th>
							<th align="center"><strong>NUMERO TELEFONICO</strong></th>
							<th align="center"><strong>EXTENSION</strong></th>
							<th align="center" colspan="2"><strong>TIPO TELEFONO</strong></th>	
							<th align="center" colspan="2"><strong>EMPRESA TELEFONO</strong></th>						
						</tr>';
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{			
			$detalle = $detalle.'<tr class="row'.$clase.'" onmouseover="this.className=\'selected\'" onmouseout="this.className=\'row'.$clase.'\'">
									<td>'.$row["cod_persona"].'</td>
									<td>'.$row["primer_nombre"].' '.$row["primer_apellido"].'</td>
									<td>'.$row["num_telefono"].'</td>
									<td>'.$row["des_extension"].'</td>
									<td>'.$row["cod_tipo"].'</td>	
									<td>'.$row["des_tipo"].'</td>
									<td>'.$row["cod_empresa"].'</td>	
									<td>'.$row["des_empresa"].'</td>									
								</tr>';
		}
	}
	if ($detalle == '')
	{
			echo 'ninguno';
	}else 
	{
		$detalle = $detalle."</table>";
		echo $detalle;
	}
	$conn->close();
?>