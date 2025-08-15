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
    $('#mimodaltema').on('shown.bs.modal', function() {
      $('#primero').focus();
    })
  	});
	});
	</script>
	<title></title>
</head>
<body>
<div class="container">
<h1>Listado de Cursos</h1>
<a href="index.html">Ventana Principal</a>
<hr>
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#mimodaltema" id="boton_modal">
Nuevo Curso
</button>
<br>
<br>
<table class="table table-bordered">
	<tr>
		<th class="text-center">Identificador</th>
		<th class="text-center">Nombre del Curso</th>
		<th class="text-center">Descripcion del Curso</th>
		<th class="text-center">Fecha de Inicio de Dictado</th>
		<th class="text-center">Estado del Curso</th>
		<th class="text-center">Aplicable Descuentos</th>
		<th class="text-center">Costo del Curso</th>
		<th class="text-center">Acciones</th>
	</tr>
	<tr>
		<td class="text-center">1</td>
		<td class="text-center">Circuitos</td>
		<td class="text-center">Descripcion de Circuitos</td>
		<td class="text-center">25/03/2020</td>
		<td class="text-center">Disponible</td>
		<td class="text-center">Aplicable Descuentos</td>
		<td class="text-center">400</td>
		<td class="text-center">
			<a class="btn btn-warning btn-sm" href="">Editar</a>
			<a class="btn btn-danger btn-sm" href="">Eliminar</a>
		</td>
	</tr>
	<tr>
		<td class="text-center">2</td>
		<td class="text-center">Sistemas de Potencia</td>
		<td class="text-center">Descripcion de Sistemas</td>
		<td class="text-center">22/03/2020</td>
		<td class="text-center">No Disponible</td>
		<td class="text-center">No Aplicable Descuentos</td>
		<td class="text-center">500</td>
		<td class="text-center">
			<a class="btn btn-warning btn-sm" href="">Editar</a>
			<a class="btn btn-danger btn-sm" href="">Eliminar</a>
		</td>
	</tr>
</table>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="mimodaltema" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
		
		<!-- formulario -->
		<div class="container">
		<h1 style="text-align: center">Agregar un Curso</h1>
		<hr>
		<form class="form-horizontal form-control" style="width:400px;height:590px;margin:0 auto">
		Nombre del Curso:
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		Descripcion del Curso:
		<br>
		<textarea style="resize: none" class="form-control" name="" rows="5" cols="5">Describa el Curso...</textarea>
		Fecha de Inicio del Dictado del Curso:
		<br>
		<input class="form-control" type="date" name="" id="primero" />
		Estado del Curso:
		<br>
		<select class="form-control">
  			<option value="volvo">Disponible</option>
  			<option value="saab">No Disponible</option>
		</select> 
		Descuentos del Curso:
		<br>
		<select class="form-control">
  			<option value="volvo">Aplicable Descuentos</option>
  			<option value="saab">No Aplicable Descuentos</option>
		</select> 
		Costo del Curso:
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