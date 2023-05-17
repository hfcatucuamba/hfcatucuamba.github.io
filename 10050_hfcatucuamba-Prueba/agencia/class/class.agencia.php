<?php
class agencia{
	
	
	private $id;
	private $descripcion;
	private $direccion;
	private $telefono;
	private $hinicio;
	private $hfinal;
	private $foto;
	private $con;
	
	function __construct($cn){
		$this->con = $cn;
	    //echo "EJECUTANDOSE EL CONSTRUCTOR VEHICULO<br><br>";
	}
	


	public function get_form($id=NULL){
		// Código agregado -- //
	if(($id == NULL) || ($id == 0) ) {
			$this->descripcion = NULL;
			$this->direccion= NULL;
			$this->telefono = NULL;
			$this->hinicio = NULL;
			$this->hfinal = NULL;
			$this->foto = NULL;
			
			$flag = 'enabled';
			$op = "new";
			$bandera = 1;
	}else{
			$sql = "SELECT * FROM agencia WHERE id=$id;";
			$res = $this->con->query($sql);
			$row = $res->fetch_assoc();
            $num = $res->num_rows;
            $bandera = ($num==0) ? 0 : 1;
            
            if(!($bandera)){
                $mensaje = "tratar de actualizar la agencia con id= ".$id . "<br>";
                echo $this->_message_error($mensaje);
				
            }else{                
                
				
				/*echo "<br>REGISTRO A MODIFICAR: <br>";
					echo "<pre>";
						print_r($row);
					echo "</pre>";*/
			
		
             // ATRIBUTOS DE LA CLASE VEHICULO   
				$this->descripcion = $row['descripcion'];
				$this->direccion= $row['direccion'];
				$this->telefono = $row['telefono'];
				$this->hinicio = $row['hinicio'];
				$this->hfinal = $row['hfinal'];
				$this->foto = $row['foto'];
				
                //$flag = "disabled";
				$flag = "enabled";
                $op = "act"; 
            }
	}
        
	if($bandera){
    
		$html = '
		<section>
		<div class="banner">
        <div class="container p-5">
          <div class="card mx-3 mt-n5 shadow-lg">

		

		<div class="card-body ">

		<form class=" " name="Form_vehiculo" method="POST" action="index.php" enctype="multipart/form-data" >
		<input type="hidden" name="id" value="' . $id  . '">
		<input type="hidden" name="op" value="' . $op  . '">
			<table  align="center"table table-striped gap-3 >
				<tr>
					<th colspan="2" ><strong><FONT SIZE=7>DATOS AGENCIA</font></th>
				</tr>
				<tr class="mx-auto">
					<td><strong><FONT SIZE=5>Descripcion:</font></strong></td>
					
					<td><input for="floatingTextInput1" class="col-12" type="text" name="descripcion" value="' . $this->descripcion . '"></td>
				</tr>
				<tr class="mx-auto">
					<td><strong><FONT SIZE=5>Direccion:</font></strong></td>
					<td><input type="text"  for="floatingTextInput1"  class="col-12" name="direccion" value="' . $this->direccion . '"></td>
				</tr>	
				<tr class="mx-auto">
					<td><strong><FONT SIZE=5>Telefono:</font></strong></td>
					<td><input type="text" size="15"  for="floatingTextInput1" class="col-12" name="telefono" value="' . $this->telefono . '"></td>
				</tr>
				<tr class="mx-auto">
					<td><strong><FONT SIZE=5>Hora Apertura:</font></strong></td>
					<td><input type="time" size="15"  for="floatingTextInput1" class="col-12" name="hinicio" value="' . $this->hinicio . '"></td>
				</tr>

				<tr class="mx-auto">
					<td><strong><FONT SIZE=5>Hora Cierre:</font></strong></td>
					<td><input type="time" size="15"  for="floatingTextInput1" class="col-12" name="hfinal" value="' . $this->hfinal . '"></td>
				</tr>
				<tr class="mx-auto">
					<td><strong><FONT SIZE=5>Foto:</font></strong></td>
					<td><input type="file" name="foto" class="col-12"' . $flag . '></td>
				</tr>
				<th colspan="1" class="text-center">
				    <div class="d-flex justify-content-end">
				      <input type="submit" name="Guardar" value="GUARDAR" class="btn btn-primary">
				    </div>
				  </th>
				  <th colspan="3" class="text-center">
				    <div class="d-flex justify-content-center">
				      <a class="btn btn-primary" href="index.php">CANCELAR</a>
				    </div>
				  </th>												
			</table>
			</div>

			</div></div></div>

			<section>
			';
		return $html;
		}
	}
	
	
	
	public function get_list(){
		$d_new = "new/0";                           //Línea agregada
        $d_new_final = base64_encode($d_new);       //Línea agregada
				
		$html = ' 

		<div class="container-striped container p-5 " >
		<div class="row  justify-content-center">
			<div class=" text-center ">
		<table class="table" align="center" style="text-align:center;" border="1">
			<tr>
				<th colspan="9" class="text-light bg-dark">Lista de Agencias</th>
			</tr>
			<tr>
				<th colspan="8" ><a class="btn bg-secondary col-sm-8 " href="index.php?d=' . $d_new_final . '" >Nuevo</a></th>
			</tr>

			<tr class="table-active btn-primary" >
				<th>Descripcion</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Hora Apertura</th>
				<th>Hora Cierre</th>
				<th>Foto</th>
				<th colspan="3">Acciones</th>
			</tr>

			
			</div>
			</div>
			</div>';
		$sql = "SELECT a.id, a.descripcion, a.direccion, a.telefono, a.hinicio, a.hfinal, a.foto 
		        FROM agencia a;";	
		$res = $this->con->query($sql);
		
		
		
		// VERIFICA si existe TUPLAS EN EJECUCION DEL Query
		$num = $res->num_rows;
        if($num != 0){
		
		    while($row = $res->fetch_assoc()){
			/*
				echo "<br>VARIALE ROW ...... <br>";
				echo "<pre>";
						print_r($row);
				echo "</pre>";
			*/
		    		
				// URL PARA BORRAR
				$d_del = "del/" . $row['id'];
				$d_del_final = base64_encode($d_del);
				
				// URL PARA ACTUALIZAR
				$d_act = "act/" . $row['id'];
				$d_act_final = base64_encode($d_act);
				
				// URL PARA EL DETALLE
				$d_det = "det/" . $row['id'];
				$d_det_final = base64_encode($d_det);	
				
				$html .= '
				<tbody>

					<tr>
						<td>' . $row['descripcion'] . '</td>
						<td>' . $row['direccion'] . '</td>
						<td>' . $row['telefono'] . '</td>
						<td>' . $row['hinicio'] . '</td>
						<td>' . $row['hfinal'] . '</td>
						<td>' . $row['foto'] . '</td>
						<td><a class="btn btn-danger btn-responsive " href="index.php?d=' . $d_del_final . '">Borrar</a></td>
						<td><a  class="btn btn-success btn-responsive" href="index.php?d=' . $d_act_final . '">Actualizar</a></td>
						<td><a  class="btn btn-warning btn-responsive" href="index.php?d=' . $d_det_final . '">Detalle</a></td>
					</tr>
					</tbody>
					';
			 
		    }
		}else{
			$mensaje = "Tabla Agencia" . "<br>";
            echo $this->_message_BD_Vacia($mensaje);
			echo "<br><br><br>";
		}
		$html .= '</table>';
		$html .= '<a href="../index.html" class="btn btn-primary">Regresar</a>';
		return $html;
		
	}
	
	
//********************************************************************************************************
	/*
	 $tabla es la tabla de la base de datos
	 $valor es el nombre del campo que utilizaremos como valor del option
	 $etiqueta es nombre del campo que utilizaremos como etiqueta del option
	 $nombre es el nombre del campo tipo combo box (select)
	 * $defecto es el valor para que cargue el combo por defecto
	 */ 
	 
	 // _get_combo_db("marca","id","descripcion","marca",$this->marca)
	 // _get_combo_db("color","id","descripcion","color", $this->color)
	 
	 /*Aquí se agregó el parámetro:  $defecto*/
	private function _get_combo_db($tabla,$valor,$etiqueta,$nombre,$defecto=NULL){
		$html = '<select class="form-select" size="1" style="text-align:center;" name="' . $nombre . '">';
		$sql = "SELECT $valor,$etiqueta FROM $tabla;";
		$res = $this->con->query($sql);
		//$num = $res->num_rows;


		while($row = $res->fetch_assoc()){
		
		/*
			echo "<br>VARIABLE ROW <br>";
					echo "<pre>";
						print_r($row);
					echo "</pre>";
		*/	
			$html .= ($defecto == $row[$valor])?'<option value="' . $row[$valor] . '" selected>' . $row[$etiqueta] . '</option>' . "\n" : '<option value="' . $row[$valor] . '">' . $row[$etiqueta] . '</option>' . "\n";
		}
		$html .= '</select>';
		return $html;
	}
	
	//_get_combo_anio("anio",1950,$this->anio)
	/*Aquí se agregó el parámetro:  $defecto*/
	private function _get_combo_anio($nombre,$anio_inicial,$defecto=NULL){
		$html = '<select class="form-select" size="1" style="text-align:center;" name="' . $nombre . '">';
		$anio_actual = date('Y');
		for($i=$anio_inicial;$i<=$anio_actual;$i++){
			$html .= ($defecto == $i)? '<option  class="form-select" size="1" style="text-align:center;"value="' . $i . '" selected>' . $i . '</option>' . "\n":'<option value="' . $i . '">' . $i . '</option>' . "\n";
		}
		$html .= '</select>';
		return $html;
	}
	
	
	//_get_radio($combustibles, "combustible",$this->combustible) 
	/*Aquí se agregó el parámetro:  $defecto*/
	private function _get_radio($arreglo,$nombre,$defecto=NULL){
		$html = '
		<table border=0 align="left">';
		foreach($arreglo as $etiqueta){
			$html .= '
			<tr>
				<td>' . $etiqueta . '</td>
				<td>';
				$html .= ($defecto == $etiqueta)? '<input type="radio" value="' . $etiqueta . '" name="' . $nombre . '" checked/></td>':'<input type="radio" value="' . $etiqueta . '" name="' . $nombre . '"/></td>';
			
			$html .= '</tr>';
		}
		$html .= '</table>';
		return $html;
	}
	
	
//****************************************** NUEVO CODIGO *****************************************

public function get_detail_agencia($id){
		$sql = "SELECT a.id, a.descripcion, a.direccion, a.telefono, a.hinicio, a.hfinal, a.foto 
		        FROM agencia a
		        WHERE a.id=$id;";
		$res = $this->con->query($sql);
		$row = $res->fetch_assoc();
		
		// VERIFICA SI EXISTE id
		$num = $res->num_rows;
        
	if($num == 0){
        $mensaje = "desplegar el detalle del agencia con id= ".$id . "<br>";
        echo $this->_message_error($mensaje);
				
    }else{ 
	
	    /*echo "<br>TUPLA<br>";
	    echo "<pre>";
				print_r($row);
		echo "</pre>";
	*/
		$html = '
				<section>
		<div class="banner">
        <div class="container p-5">
          <div class="card mx-3 mt-n5 shadow-lg">

			<div class="card-body ">
		<table align="center"table table-striped gap-3 >
			<tr>
				<th colspan="2"><strong><FONT SIZE=7>DATOS DE LA AGENCIA</font></th>
			</tr>
			<tr>
				<td><strong><FONT SIZE=5>Descripcion: </td>
				<td>'. $row['descripcion'] .'</td>
			</tr>
			<tr>
				<td><strong><FONT SIZE=5>Direccion: </td>
				<td>'. $row['direccion'] .'</td>
			</tr>
			<tr>
				<td><strong><FONT SIZE=5>Telefono: </td>
				<td>'. $row['telefono'] .'</td>
			</tr>
			<tr>
				<td><strong><FONT SIZE=5>Hora Apertura: </td>
				<td>'. $row['hinicio'] .'</td>
			</tr>
			<tr>
				<td><strong><FONT SIZE=5>Hora Cierre: </td>
				<td>'. $row['hfinal'] .'</td>
			</tr>			
			<tr>
				<th colspan="2"><center><img src="images/' . $row['foto'] . '" width="300px"/></center></th>
			</tr>	
			<tr>
				<th colspan="2"><a class="btn btn-primary col-12 " href="index.php">Regresar</a></th>
			</tr>																						
		</table>
		</div>
					</div></div></div>

			<section>
		';
		
		return $html;
	}	
	
}


	public function delete_agencia($id){
		
/*		$mensaje = "PROXIMAMENTE SE ELIMINARA el vehiculo con id= ".$id . "<br>";
        echo $this->_message_error($mensaje);*/
		
	   
		$sql = "DELETE FROM agencia WHERE id=$id;";
		if($this->con->query($sql)){
			echo $this->_message_ok("eliminó");
		}else{
			echo $this->_message_error("eliminar<br>");
		}
   		
	}

	public function update_agencia($datos){
		$this->id = $datos['id'];
		$this->descripcion = $datos['descripcion'];
		$this->direccion= $datos['direccion'];
		$this->telefono = $datos['telefono'];
		$this->hinicio = $datos['hinicio'];
		$this->hfinal = $datos['hfinal'];
		$this->foto = $_FILES['foto']['name'];
		$sql = "UPDATE agencia SET descripcion='$this->descripcion', direccion='$this->direccion', telefono='$this->telefono', hinicio='$this->hinicio', hfinal='$this->hfinal', foto='$this->foto'
	WHERE id=$this->id;";
		if($this->con->query($sql)){
			echo $this->_message_ok("actualizó");
		}else{
			echo $this->_message_error("actualizar<br>");
		}
	}

	public function save_agencia($datos){
		$this->descripcion = $datos['descripcion'];
		$this->direccion= $datos['direccion'];
		$this->telefono = $datos['telefono'];
		$this->hinicio = $datos['hinicio'];
		$this->hfinal = $datos['hfinal'];
		$this->foto = $_FILES['foto']['name'];
		$sql = "INSERT INTO agencia (descripcion, direccion, telefono, hinicio, hfinal, foto) 
				VALUES ('$this->descripcion','$this->direccion', '$this->telefono', '$this->hinicio', '$this->hfinal', '$this->foto');";
		if($this->con->query($sql)){
			echo $this->_message_ok("grabo");
		}else{
			echo $this->_message_error("grabar<br>");
		}
	}


	
//***************************************************************************************	
	
	private function _calculo_matricula($avaluo){
		return number_format(($avaluo * 0.10),2);
	}
	
//***************************************************************************************************************************
	
	private function _message_error($tipo){
		$html = '
		<table border="0" align="center">
			<tr>
				<th>Error al ' . $tipo . 'Favor contactar a .................... </th>
			</tr>
			<tr>
				<th><a href="index.php">Regresar</a></th>
			</tr>
		</table>';
		return $html;
	}
	
	
	private function _message_BD_Vacia($tipo){
	   $html = '
		<table border="0" align="center">
			<tr>
				<th> NO existen registros en la ' . $tipo . 'Favor contactar a .................... </th>
			</tr>
	
		</table>';
		return $html;
	
	
	}
	
	private function _message_ok($tipo){
		$html = '
		<table border="0" align="center">
			<tr>
				<th>El registro se  ' . $tipo . ' correctamente</th>
			</tr>
			<tr>
				<th><a class="btn btn-success col-sm-12 "href="index.php">Regresar</a></th>
			</tr>
		</table>';
		return $html;
	}

//************************************************************************************************************************************************

 
}
?>

