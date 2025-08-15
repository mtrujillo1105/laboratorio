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
    $('#mimodalreserva').on('shown.bs.modal', function() {
      $('#primero').focus();
    })
  	});
	});
	</script>
	<title></title>
</head>
<body>
<div class="container">
<h1>Listado de Dias Laborables por Semana</h1>
<a href="index.html">Ventana Principal</a>
<hr>
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#mimodalreserva" id="boton_modal">
Nueva Dia Laborable por Semana 
</button>
<br>
<br>
<table class="table table-bordered">
	<tr>
		<th class="text-center">Identficador</th>
		<th class="text-center">Numero del Dia Laborable</th>
		<th class="text-center">Nombre del Dia Laborable</th>
		<th class="text-center">Acciones</th>
	</tr>
	<tr>
		<td class="text-center">1</td>
		<td class="text-center">1</td>
		<td class="text-center">Lunes</td>
		<td class="text-center">
			<a class="btn btn-warning btn-sm" href="">Editar</a>
			<a class="btn btn-danger btn-sm" href="">Eliminar</a>
		</td>
	</tr>
	<tr>
		<td class="text-center">1</td>
		<td class="text-center">2</td>
		<td class="text-center">Martes</td>
		<td class="text-center">
			<a class="btn btn-warning btn-sm" href="">Editar</a>
			<a class="btn btn-danger btn-sm" href="">Eliminar</a>
		</td>
	</tr>
</table>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="mimodalreserva" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
		
		<!-- formulario -->
		<div class="container">
		<h1 style="text-align: center">Agregar Reserva</h1>
		<hr>
		<form class="form-horizontal form-control" style="width:400px;height:290px;margin:0 auto">
		Numero del Dia Laborable:
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		Nombre del Dia Laborable:
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		Semana Laborable:
		<select class="form-control">
  			<option value="volvo">Semana 1</option>
  			<option value="saab">Semana 2</option>
		</select> 
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