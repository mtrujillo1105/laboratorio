<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;

use App\Ensayo;
use App\Solicitante;
use App\Contacto;
use App\Cotizacion;
use App\TipoSolicitante;
use App\Ubigeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect, Response;

class UbigeoController extends Controller
{
    public function index()
    {
    }

    public static function listDepartamentos()
    {
        $departamentos = Ubigeo::where('UBIGC_CodDpto', '<>', '00')
                               ->where('UBIGC_CodProv', '=', '00')
                               ->where('UBIGC_CodDist', '=', '00')
                               ->where('UBIGC_FlagEstado', '=', '1')
                               ->orderBy('UBIGC_Descripcion')
                               ->get();
        return $departamentos;
    }

    public static function listProvincias($idDepartamento)
    {
        $provincias = Ubigeo::where('UBIGC_CodDpto', '<>', '00')
                            ->where('UBIGC_CodProv', '<>', '00')
                            ->where('UBIGC_CodDist', '=', '00')
                            ->where('UBIGC_CodDpto', '=', $idDepartamento)
                            ->where('UBIGC_FlagEstado', '=', '1')
                            ->orderBy('UBIGC_Descripcion')
                            ->get();
        return $provincias;
    }

    public static function listDistritos($idDepartamento, $idProvincia)
    {
        $distritos = Ubigeo::where('UBIGC_CodDpto', '<>', '00')
                           ->where('UBIGC_CodProv', '<>', '00')
                           ->where('UBIGC_CodDist', '<>', '00')
                           ->where('UBIGC_CodDpto', '=', $idDepartamento)
                           ->where('UBIGC_CodProv', '=', $idProvincia)
                           ->where('UBIGC_FlagEstado', '=', '1')
                           ->orderBy('UBIGC_Descripcion')
                           ->get();
        return $distritos;
    }

    public function store(Request $request)
    {
    }

    public function edit($id)
    {
    }

    public function destroy($id)
    {
    }
}
