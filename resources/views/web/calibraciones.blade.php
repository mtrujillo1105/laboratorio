@extends('layouts.web')

@section('content')

<!--Pagina de contenido-->

    <div class="row">    
      <div class="col-md-12">
        <h1 style="text-align: center;font-size:65px;">Formulario para la Calibracion de Equipos</h1>
        <hr>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3 style="text-align: center">Agregar Solicitante de Cotizacion</h3>
		<form class="form-horizontal form-control" style="width:500px;height:600px;margin:0 auto">
		Nombre del Solicitante:
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		Tipo de Solicitante:
		<br>
		<select class="form-control">
  			<option value="volvo">Persona Juridica</option>
  			<option value="saab">Persona Natural</option>
		</select>
		RUC del Solicitante:
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		Direccion del Solicitante:
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		Telefono del Solicitante:
		<input class="form-control" type="text" name="" id="primero" />
		Email del Solicitante:
		<input class="form-control" type="text" name="" id="primero" />
		Nombre del Departamento:
		<br>
		<select class="form-control">
  			<option value="volvo">2020</option>
  			<option value="saab">2019</option>
		</select> 
		Nombre de la Provincia:
		<br>
		<select class="form-control">
  			<option value="volvo">2020</option>
  			<option value="saab">2019</option>
		</select> 
		Nombre del Distrito:
		<br>
		<select class="form-control">
  			<option value="volvo">2020</option>
  			<option value="saab">2019</option>
		</select> 
		<br>
		</form>
        </div>
        <div class="col-md-6">
            <h3 style="text-align: center">Agregar Contacto para la Cotizacion</h3>
            <form class="form-horizontal form-control" style="width:500px;height:600px;margin:0 auto">
            Nombre del Contacto:
            <br>
            <input class="form-control" type="text" name="" id="primero" />
            Correo Electronico del Contacto:
            <br>
            <input class="form-control" type="text" name="" id="primero" />
            Celular del Contacto:
            <br>
            <input class="form-control" type="text" name="" id="primero" />
            <br>
            </form>
        </div>
    </div>
      <div class="row">
          <h2 style="text-align:center;text-decoration: underline;">Equipos a Calibrar que forman parte de la Cotizacion</h2>
          <div class="col-md-12">
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#mimodalequipo" id="boton_modal">
            Nuevo Equipo
            </button>
            <table class="table table-bordered">
                    <tr>
                            <th class="text-center">Identificador</th>
                            <th class="text-center">Nombre del Equipo</th>
                            <th class="text-center">Descripcion del Equipo</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">Fabricante</th>
                            <th class="text-center">Descripcion Ficha Tecnica</th>
                            <th class="text-center">URL Ficha Tecnica del Equipo</th>
                            <th class="text-center">Acciones</th>
                    </tr>
                    <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">Telurometro</td>
                            <td class="text-center">Equipo para medir la resistencia...</td>
                            <td class="text-center">2</td>
                            <td class="text-center">Siemens</td>
                            <td class="text-center">Equipo para medir la resistencia...</td>
                            <td class="text-center">www.sieemes.com.pe</td>
                            <td class="text-center">
                                    <a class="btn btn-warning btn-sm" href="">Editar</a>
                                    <a class="btn btn-danger btn-sm" href="">Eliminar</a>
                            </td>
                    </tr>
                    <tr>
                            <td class="text-center">2</td>
                            <td class="text-center">Telurometro</td>
                            <td class="text-center">Equipo para medir la resistencia...</td>
                            <td class="text-center">1</td>
                            <td class="text-center">Siemens</td>
                            <td class="text-center">Equipo para medir la resistencia...</td>
                            <td class="text-center">www.sieemes.com.pe</td>
                            <td class="text-center">
                                    <a class="btn btn-warning btn-sm" href="">Editar</a>
                                    <a class="btn btn-danger btn-sm" href="">Eliminar</a>
                            </td>
                    </tr>
            </table>   
          </div>
      </div>
      <div class="row p-3 mb-2">
          <div class="col-md-12">
                <h4 style="text-align:center;">Ingresar los 6 correos electronicos a los que les enviara la cotizacion en formato pdf</h4>           
          </div>
        <div class="col-md-4">
            <form class="form-horizontal form-control" style="width:330px;height:150px;margin:0 auto">
                Correo #1:
                <br>
                <input class="form-control" type="text" name="" id="primero" />
                Correo #2:
                <br>
                <input class="form-control" type="text" name="" id="primero" />
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-horizontal form-control" style="width:330px;height:150px;margin:0 auto">
		Correo #3:
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		Correo #4:
		<br>
		<input class="form-control" type="text" name="" id="primero" />
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-horizontal form-control" style="width:330px;height:150px;margin:0 auto">
		Correo #5:
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		Correo #6:
		<br>
		<input class="form-control" type="text" name="" id="primero" />
            </form>
        </div>
      </div>
      <div class="row pb-5">
          <div class="col-md-12 text-center text-lg-center">
            <button type="button" class="btn btn-outline-success btn-lg" data-toggle="modal" data-target="#" id="boton_modal" style="width:40%;font-size:45px;font-weight:bold;">
            Enviar Cotizacion
            </button>
          </div>
      </div>
  <!--/Pagina de contenido-->

@endsection

@section('modals')
 <!-- Modal Numero 3 -->
<div class="modal fade" id="mimodalequipo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
		
		<!-- formulario -->
		<div class="container">
		<h1 style="text-align: center">Agregar Equipos a la Cotizacion</h1>
		<hr>
		<form class="form-horizontal form-control" style="width:400px;height:940px;margin:0 auto">
		Nombre del Equipo:
		<br>
		<input class="form-control" type="text" name="" id="primero" />
		Descripcion del Equipo:
		<br>
		<textarea style="resize: none" class="form-control" name="" rows="5" cols="5">Escribir algo...</textarea>
		Cantidad de Equipos:
		<input class="form-control" type="text" name="" id="primero" />
		Fabricante del Equipo:
		<input class="form-control" type="text" name="" id="primero" />
		Descripcion Tecnica del Equipo:
		<textarea style="resize: none" class="form-control" name="" rows="5" cols="5">Escribir algo...</textarea>
		URL de la Ficha Tecnica del Equipo:
		<textarea style="resize: none" class="form-control" name="" rows="5" cols="5">Escribir algo...</textarea>
		<div class="form-group">
   			<label for="ejemplo_archivo_1">Adjuntar un archivo de la descripcion del equipo</label>
    		<input type="file" id="ejemplo_archivo_1">
  		</div>	
  		Estado de la Ficha Tecnica:
		<select class="form-control">
  			<option value="volvo">Se describe en el formulario</option>
  			<option value="saab">Se proporciona el URL en el formulario</option>
  			<option value="volvo">Se describe y se indica el URL en el formulario</option>
  			<option value="saab">No se precisa la Ficha Tecnica en el formulario</option>
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
  
@endsection