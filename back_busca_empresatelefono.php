<?php
	include ('conexion_bd.php');
	$filtro = $_REQUEST['nombre_filtro'];
	
	if ($filtro == "")
	{
		$filtro = "%%";
	}

	$sql = "SELECT cod_empresa, des_empresa FROM cat_tipoempresa WHERE cod_empresa LIKE '%".$filtro ."%' OR des_empresa LIKE '%".$filtro ."%' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{

		

		$detalle = '<table>
						<tr>
							<th align="center"><strong>CODIGO</strong></th>
							<th align="center"><strong>DESCRIPCION</strong></th>
						</tr>';
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{			
			$detalle = $detalle.'<tr class="row'.$clase.'" onmouseover="this.className=\'selected\'" onmouseout="this.className=\'row'.$clase.'\'">
									<td align="center">'.$row["cod_empresa"].'</td>
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