<?php
	include ('conexion_bd.php');
	$filtro = $_REQUEST['nombre_filtro'];
	
	if ($filtro == "")
	{
		$filtro = "%%";
	}

	$sql = "SELECT cod_tipo, des_tipo FROM cat_tipotelefono WHERE cod_tipo LIKE '%".$filtro ."%' OR des_tipo LIKE '%".$filtro ."%' ";
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
			$detalle = $detalle.'<tr class="row'.$clase.'" onmouseover="this.className=\'selected\'" onmouseout="this.className=\'row'.$clase.'\'"><td align="center">'.$row["cod_tipo"].'</td><td>'.$row["des_tipo"].'</td></tr>';
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