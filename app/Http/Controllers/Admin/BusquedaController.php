<?php
namespace App\Http\Controllers\Admin;

use App\CotizacionDetalle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusquedaController extends Controller
{
    public function index()
    {
        return view('admin.busqueda-historica.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {

    }

    public function list($tipo){

        // $cotizacion_detalle = CotizacionDetalle::
    }

    public function get($id)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy($id)
    {

    }
}
