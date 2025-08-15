<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script>
	$(document).ready(function() {
  	$("#boton_modal").click(function() {
    $('#mimodallibrotema').on('shown.bs.modal', function() {
      $('#primero').focus();
    })
  	});
	});
	</script>
	<title></title>
</head>
<body>
<div class="container">
<h1>Listado del Personal para Cotizaciones</h1>
<a href="index.html">Ventana Principal</a>
<hr>
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#mimodallibrotema" id="boton_modal">
Nuevo Personal para Cotizaciones 
</button>
<br>
<br>
<table class="table table-bordered">
	<tr>
		<th class="text-center">Identificador</th>	
		<th class="text-center">Nombre</th>
		<th class="text-center">Correo Electronico</th>
		<th class="text-center">Celular</th>
		<th class="text-center">Telefono Fijo</th>
		<th class="text-center">Usuario</th>
		<th class="text-center">Password</th>
		<th class="text-center">Acciones</th>
	</tr>
	<tr>
		<th class="text-center">1</th>	
		<th class="text-center">Edward Figueroa Maldonado</th>
		<th class="text-center">edward.figueroa.ing@gmail.com</th>
		<th class="text-center">952076272</th>
		<th class="text-center">5681903</th>
		<th class="text-center">efigueroa</th>
		<th class="text-center">123456</th>
		<td class="text-center">
			<a class="btn btn-warning btn-sm" href="">Editar</a>
			<a class="btn btn-danger btn-sm" href="">Eliminar</a>
		</td>
	</tr>
	<tr>
		<th class="text-center">2</th>	
		<th class="text-center">Alexander Figueroa Maldonado</th>
		<th class="text-center">afigueroa@pucp.edu.pe</th>
		<th class="text-center">992023448</th>
		<th class="text-center">4716941</th>
		<th class="text-center">alex.maldonado</th>
		<th class="text-center">123456</th>
		<td class="text-center">
			<a class="btn btn-warning btn-sm" href="">Editar</a>
			<a class="btn btn-danger btn-sm" href="">Eliminar</a>
		</td>
	</tr>
</table>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="mimodallibrotema" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
		
		<!-- formulario -->
		<div class="container">
		<h1 style="text-align: center">Agregar Personal para Cotizaciones</h1>
		<hr>
		<form class="form-horizontal form-control" style="width:400px;height:730px;margin:0 auto">
		Nombre del Personal:
		<br>
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		<br>
		Correo Electronico del Personal:
		<br>
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		<br>
		Celular del Personal:
		<br>
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		<br>
		Telefono Fijo del Personal:
		<br>
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		<br>
		Cuenta de Usuario del Personal:
		<br>
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		<br>
		Password del Personal:
		<br>
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		<br>
		<input class="btn btn-primary btn-lg" type="submit" name="" value="Guardar" />
		</form>
		</div>
		<!-- formulario -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>



</body>
</html>