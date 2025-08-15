<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});

Route::view('welcome','prueba',['name'=>'Rossmery']);*/

//Route::get('/','Auth\LoginController@showLoginForm')->name('login');
Route::get('/usuario/list','Admin\UsuarioController@list');
Route::delete('usuario/{id}', 'Admin\UsuarioController@delete');

Route::get('/solicitante/list','Admin\SolicitanteController@list')->name('solicitante.list');
Route::get('/solicitante/contacto/get/{id}','Admin\SolicitanteController@getContacto')->name('solicitante.get');
Route::post('/solicitante/store', 'Admin\SolicitanteController@store')->name('solicitante.store');
Route::put('/solicitante/update', 'Admin\SolicitanteController@update')->name('solicitante.update');
Route::get('/solicitante/{id_solicitante}/edit','Admin\SolicitanteController@edit')->name('solicitante.edit');
Route::get('/solicitante/{id}/get','Admin\SolicitanteController@get');
Route::delete("/solicitante/{id}","Admin\SolicitanteController@delete");
Route::get('/tiposolicitante/list','Admin\SolicitanteController@listTiposSolicitantes');

Route::get('/contacto/list','Admin\ContactoController@list')->name('contacto.list');
Route::get('/contacto/solicitante/get/{id}','Admin\ContactoController@getSolicitante')->name('contacto.get');
Route::get('/contacto/solicitante/list/{id}','Admin\ContactoController@listBySolicitante')->name('contacto.order');
Route::post('/contacto','Admin\ContactoController@store')->name('contacto.store');
Route::put('/contacto','Admin\ContactoController@update')->name('contacto.update');

Route::get('/curso/list','Admin\CursoController@list');
Route::get('/curso/create', 'Admin\CursoController@create');
Route::post('/curso', 'Admin\CursoController@store');
Route::put('/curso', 'Admin\CursoController@update');
Route::delete('/curso/delete/{id}', 'Admin\CursoController@destroy');
Route::get('/curso/{id}', 'Admin\CursoController@get');
Route::get('/curso/{id}/descuento', 'Admin\CursoController@getDescuentos');

Route::post('/descuento', 'Admin\DescuentoController@store');
Route::delete('/descuento/{id}', 'Admin\DescuentoController@destroy');
Route::get('/descuento/list', 'Admin\DescuentoController@list');

Route::get('/contacto/{contacto}/get','Admin\ContactoController@get');
Route::get('/ensayos','WebController@ensayos');
Route::get('/calibraciones','WebController@calibraciones');
Route::get('/capacitaciones','WebController@capacitaciones');
Route::get('/home', 'HomeController@index')->name('home');
//Ruta para crear el pdf
Route::get('cursos-list-pdf', 'Admin\CursoController@exportPdf')->name('cursos.pdf');
Route::get('cotizaciones-list-pdf', 'Admin\CotizacionController@exportPdf')->name('cotizaciones.pdf');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/authenticate', 'Auth\LoginController@authenticate')->name('authenticate');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::resource('usuario','Admin\UsuarioController');

Route::post('/cotizacion/store', 'Admin\CotizacionController@store')->name('cotizacion.store');
Route::get('/cotizacion/list', 'Admin\CotizacionController@list')->name('cotizacion.list');
Route::get('/cotizacion/listDatosDashboard', 'Admin\CotizacionController@listDatosDashboard');
Route::get('/cotizacion/create', 'Admin\CotizacionController@create')->name('createCotizacion');
Route::get('/cotizacion', 'Admin\CotizacionController@index');
Route::delete("/cotizacion/delete/{id}","Admin\CotizacionController@delete")->name("delCotizacion");
Route::get('/cotizacion/{cotizacion}/get','Admin\CotizacionController@get');
Route::get('/cotizacion/{cotizacion}/edit','Admin\CotizacionController@edit');
Route::put("/cotizacion/update",'Admin\CotizacionController@update')->name('updateCotizacion');
Route::get('/cotizacion/download/{id}', 'Admin\CotizacionController@downloadFileEquipo');
Route::post('/cotizacion/pdf', 'Admin\CotizacionController@createPdf');

Route::get('/cotizaciondetalle/{cotizacion}/list','Admin\CotizacionDetalleController@list');
Route::post('/cotizacionHistorica','Admin\CotizacionDetalleController@busqueda_cotizaciones_pasadas');
Route::get('/cotizacionHistorica/{id}','Admin\CotizacionDetalleController@retornar_cotizacion_by_id');
Route::delete('/cotizaciondetalle/delete/{id}','Admin\CotizacionDetalleController@delete');

Route::get('/calibracion', 'Admin\CalibracionController@index');
Route::get('/calibracion/list', 'Admin\CalibracionController@list');
Route::get('/calibracion/create', 'Admin\CalibracionController@create')->name('createCalibracion');
Route::post('/calibracion/store', 'Admin\CalibracionController@store');
Route::get('/calibracion/{cotizacion}/edit','Admin\CalibracionController@edit');
Route::put('/calibracion/update', 'Admin\CalibracionController@update');

Route::get('/capacitacion', 'Admin\CapacitacionController@index');
Route::get('/capacitacion/list', 'Admin\CapacitacionController@list');
Route::get('/capacitacion/create', 'Admin\CapacitacionController@create')->name('createCapacitacion');
Route::post('/capacitacion/store', 'Admin\CapacitacionController@store');
Route::get('/capacitacion/{cotizacion}/edit','Admin\CapacitacionController@edit');
Route::get('/cotizacioncapacitacion/{cotizacion}/list','Admin\CotizacionCapacitacionController@list');
Route::put('/capacitacion/update', 'Admin\CapacitacionController@update');
Route::delete('/cotizacioncapacitacion/delete/{id}','Admin\CotizacionCapacitacionController@delete');

Route::get('/prueba/{cotizaciondetalle}/list', 'Admin\PruebaController@list');
Route::get('/prueba/{codprueba}/get', 'Admin\PruebaController@get');
Route::post('/prueba/store', 'Admin\PruebaController@store');
Route::delete("/prueba/delete/{id}","Admin\PruebaController@delete")->name("delPrueba");
Route::put("/prueba/update",'Admin\PruebaController@update')->name('updatePrueba');
Route::get('/prueba/download/{id}', 'Admin\CotizacionController@downloadFilePrueba');

Route::resource('categoria','Admin\CategoriaController');
Route::resource('solicitante','Admin\SolicitanteController');
Route::resource('contacto','Admin\ContactoController');

Route::post('fileupload','Admin\UploadController@store');

// Auth::routes();

// -------- Rutas de marck --------------------

//------- Rutas de gerson -----------------------
Route::resource('asesoria','Admin\AsesoriaController');
// -------- Rutas del ADMIN
Route::resource('curso','Admin\CursoController');
Route::resource('instructor','Admin\InstructorController');
Route::resource('horario-curso','Admin\HorarioCursoController');
Route::resource('horario-instructor','Admin\HorarioInstructorController');
Route::resource('instructor-curso','Admin\CursoInstructorController');
Route::resource('descuento','Admin\DescuentoController');

// -------- Rutas de diego --------------------
Route::resource('servicioac','Admin\ServicioAcademicoController');

// Rutas para busqueda
Route::resource('busqueda','Admin\BusquedaController');

// Rutas para parametros
Route::resource('parametros','Admin\ParametroController');
Route::get('/parametro','Admin\ParametroController@list');
Route::post('/parametro/list','Admin\ParametroController@get');
Route::post('/parametro','Admin\ParametroController@guardar_parametro');
Route::delete('/parametro/{id}','Admin\ParametroController@delete');

// Rutas de seguimiento
Route::resource('seguimiento','Admin\SeguimientoController');
Route::get('/seguimiento/list/{idCotizacion}','Admin\SeguimientoController@list');
Route::get('/seguimiento/{id}','Admin\SeguimientoController@get');
Route::post('/seguimiento/store','Admin\SeguimientoController@store');
Route::post('/seguimiento/update','Admin\SeguimientoController@update');
Route::delete('/seguimiento/delete/{id}','Admin\SeguimientoController@delete');

// --------- Rutas del CLIENTE ----------------------

// CREACIÓN PARA LA RUTA DE EQUIPOS ENSAYOS

Route::resource('cot_ensayos', 'Cliente\EnsayoController');
Route::resource('cot_calibraciones', 'Cliente\CalibracionController');
Route::resource('cot_capacitaciones', 'Cliente\CapacitacionController');

Route::get('/departamento/list','Cliente\UbigeoController@listDepartamentos');
Route::get('/provincia/{idDepartamento}/list','Cliente\UbigeoController@listProvincias');
Route::get('/distrito/{idDepartamento}/{idProvincia}/list','Cliente\UbigeoController@listDistritos');

Route::post('/cotizacion-ensayo-web/store', 'Cliente\CotizacionController@store');
Route::post('/cotizacion-calibracion-web/store', 'Cliente\CalibracionController@store');
Route::post('/cotizacion-capacitacion-web/store', 'Cliente\CapacitacionController@store');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// --------------------------------------------

Route::view('/academico', 'cliente/academico')->name('academico');
Route::view('/asesorias', 'cliente/asesorias')->name('asesorias');
Route::view('/capacitaciones', 'cliente/capacitaciones')->name('capacitaciones');
Route::view('/servicios', 'cliente/servicios')->name('servicios');
Route::view('/', 'cliente/nosotros')->name('nosotros');
Route::view('/trabajadores', 'cliente/trabajadores')->name('trabajadores');
Route::view('/imagenes', 'cliente/imagenes')->name('imagenes');
Route::view('/equipos', 'cliente/equipos')->name('equipos');
Route::view('/eventos', 'cliente/eventos')->name('eventos');
Route::view('/responsabilidad', 'cliente/responsabilidad')->name('responsabilidad');
Route::view('/visitas', 'cliente/visitas')->name('visitas');
Route::view('/clientes', 'cliente/clientes')->name('clientes');
Route::view('/ubicacion', 'cliente/ubicacion')->name('ubicacion');
Route::view('/cot_ensayos', 'cliente/cot_ensayos')->name('cot_ensayos');
Route::view('/cot_calibraciones', 'cliente/cot_calibraciones')->name('cot_calibraciones');
Route::view('/cot_capacitaciones', 'cliente/cot_capacitaciones')->name('cot_capacitaciones');
//Route::view('/intranet_ensayos', 'cliente/intranet_ensayos')->name('intranet_ensayos');
//Route::view('/intranet_calibraciones', 'cliente/intranet_calibraciones')->name('intranet_calibraciones');
//Route::view('/intranet_capacitaciones', 'cliente/intranet_capacitaciones')->name('intranet_capacitaciones');
// -------------------------------------------

//---------- Rutas para DataTable----------------
Route::get('dataTableUser','Admin\UsuarioController@dataTable')->name('dataTableUser');
Route::get('dataTableAsesoria','Admin\AsesoriaController@dataTable')->name('dataTableAsesoria');
