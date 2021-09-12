<?php
	include ('conexion_bd.php');
	$filtro = $_REQUEST['nombre_filtro'];
	
	if ($filtro == "")
	{
		$filtro = "%%";
	}

	$sql = "SELECT a.cod_persona, a.primer_nombre, a.segundo_nombre, a.primer_apellido, a.segundo_apellido, a.cod_depto	
				  ,b.des_depto			  
			 FROM persona AS a 
			 LEFT JOIN cat_departamento AS b
			        ON a.cod_depto = b.cod_depto 
			WHERE a.primer_nombre LIKE '%".$filtro ."%' OR a.segundo_nombre LIKE '%".$filtro ."%' 
			   OR a.primer_apellido LIKE '%".$filtro ."%' OR a.cod_depto LIKE '%".$filtro ."%'
			 ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		$detalle = '<table>
						<tr>
							<th align="center"><strong>CODIGO</strong></th>
							<th align="center"><strong>PRIMER NOMBRE</strong></th>
							<th align="center"><strong>SEGUNDO NOMBRE</strong></th>
							<th align="center"><strong>PRIMER APELLIDO</strong></th>
							<th align="center"><strong>SEGUNDO APELLIDO</strong></th>
							<th align="center" colspan="2"><strong>DEPARTAMENTO</strong></th>
						</tr>';
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{			
			$detalle = $detalle.'<tr class="row'.$clase.'" onmouseover="this.className=\'selected\'" onmouseout="this.className=\'row'.$clase.'\'">
									<td>'.$row["cod_persona"].'</td>
									<td>'.$row["primer_nombre"].'</td>
									<td>'.$row["segundo_nombre"].'</td>
									<td>'.$row["primer_apellido"].'</td>
									<td>'.$row["segundo_apellido"].'</td>
									<td>'.$row["cod_depto"].'</td>
									<td>'.$row["des_depto"].'</td>
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