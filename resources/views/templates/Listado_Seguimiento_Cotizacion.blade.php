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
    $('#mimodalautor ').on('shown.bs.modal', function() {
      $('#primero').focus();
    })
  	});
	});
	</script>
	<title></title>
</head>
<body>
<div class="container">
<h1>Listado de Autores</h1>
<a href="index.html">Ventana Principal</a>
<hr>
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#mimodalautor" id="boton_modal">
Nuevo Autor
</button>
<br>
<br>
<table class="table table-bordered">
	<tr>
		<th class="text-center">Identificador</th>
		<th class="text-center">Nombre</th>
		<th class="text-center">Apellido Paterno</th>
		<th class="text-center">Apellido Materno</th>
		<th class="text-center">Pais</th>
		<th class="text-center">Email</th>
		<th class="text-center">Acciones</th>
	</tr>
	<tr>
		<td class="text-center">1</td>
		<td class="text-center">Juan</td>
		<td class="text-center">Perez</td>
		<td class="text-center">Garcia</td>
		<td class="text-center">España</td>
		<td class="text-center">juan_perez@gmail.com</td>
		<td class="text-center">
			<a class="btn btn-warning btn-sm" href="">Editar</a>
			<a class="btn btn-danger btn-sm" href="">Eliminar</a>
		</td>
	</tr>
	<tr>
		<td class="text-center">2</td>
		<td class="text-center">Ivan</td>
		<td class="text-center">Cespedes</td>
		<td class="text-center">Cruzado</td>
		<td class="text-center">Colombia</td>
		<td class="text-center">ivan_colocoho@gmail.com</td>
		<td class="text-center">
			<a class="btn btn-warning btn-sm" href="">Editar</a>
			<a class="btn btn-danger btn-sm" href="">Eliminar</a>
		</td>
	</tr>
</table>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="mimodalautor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
		
		<!-- formulario -->
		<div class="container">
		<h1 style="text-align: center">Agregar Autor</h1>
		<hr>
		<form class="form-horizontal form-control" style="width:400px;height:410px;margin:0 auto">
		Nombre:
		<input class="form-control" type="text" name="" id="primero" />
		Apellido Paterno:
		<input class="form-control" type="text" name="" />
		Apellido Materno:
		<input class="form-control" type="text" name="" />
		Pais:
		<input class="form-control" type="text" name="" />
		Email:
		<input class="form-control" type="text" name="" />
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