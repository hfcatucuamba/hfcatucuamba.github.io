<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>FIGURA</title>
		<meta name="description" content="">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<?php
	abstract class figura{
		private $tipo;
		private $area; //area
		private $perimetro; //perimetro		
		
		public static function get_form(){
			$html = '
			<div class="m-0 vh-100 row justify-content-center align-items-center" >
				<div class="rounded border border-dark col-auto bg-light p-5 text-center">
					<div class="form-group col-sm-12 col-md-12 col-md-offset-12">
						<form name="figuras" method="POST" action="" >
							<table border=0 align="center">
								<tr>
									<th colspan="2" class="text-center login-title"><h3>INGRESO DATOS DE LA FIGURA</h3><b><hr></b></th>
									
									
								</tr>
								<tr>
									<td>Tipo: </td>
									<td>
										<select name="tipo" class="form-control" OnChange="habilitarCaja();">
											<option value="sel">Seleccione...</option>
											<option value="cuadrado">Cuadrado</option>
											<option value="rectangulo">Rectángulo</option>
											<option value="triangulo">Triángulo</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Lado 1:</td>
									<td><input type="text" name="lado_1" size="4" class="form-control" placeholder="Lado 1" disabled></td>
								</tr>
								<tr>
									<td>Lado 2:</td>
									<td><input type="text" name="lado_2" size="4" class="form-control" placeholder="Lado 2" disabled></td>
								</tr>
								<tr>
									<td>Lado 3:</td>
									<td><input type="text" name="lado_3" size="4" class="form-control" placeholder="Lado 3" disabled></td>
								</tr>							
								<tr>
									<th colspan="2"><br><input type="submit" class="btn btn-lg btn-success btn-block" name="calcular" value="Calcular"></th>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
			
			
			';
			return $html;
		}
		

	}
?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>