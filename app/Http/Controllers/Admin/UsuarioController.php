<?php
namespace App\Http\Controllers\Admin;
use App\Role;
use App\User;
use Redirect;
use App\Cotizacion;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{

    public function index(Request $request){
        $usuarios = User::all();
        $usuarios = User::leftJoin('rol','rol.ROL_Codigo','=','users.ROL_Codigo')->select()->get();
        return view('admin.usuario.index',compact('usuarios'));
    }

    /* DataTable */
    public function dataTable()
    {
        return DataTables::of(User::query())
        ->editColumn('created_at', function(User $user){
            return $user->created_at->diffForHumans();
        })
        ->addIndexColumn()
        /* ->addColumn('edit','<a href="{{route(\'usuario.edit\', $id) }}" class="btn btn-info">'.('Edit').'</a>')
        ->addColumn('delete','<form action="{{route(\'usuario.destroy\',$id)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" name="submit" value="'.('Eliminar').'" class="btn btn-danger "
                    onClick="return  confirm(\'¿Seguro que quiere eliminar?\')">
                    {{csrf_field()}}
                    </form>') */

        ->addcolumn('btn','admin.usuario.dataTable.btn')
        ->rawColumns(['btn'])
        ->toJson();
        //$usuarios = User::all();
        $usuarios = User::join('rol','rol.ROL_Codigo','=','users.ROL_Codigo')->select()->get();
        return view('admin.usuario.index',compact('usuarios'));
    }

    public function list(){
        $usuarios = User::leftJoin('rol','rol.ROL_Codigo','=','users.ROL_Codigo')->select()->get();
        return $usuarios;
    }

    public function add(Request $request, $id){
        $usuario = User::findOrFail($id);
        $usuario->ROL_Codigo = $request->rol;
        $usuario->save();
        $usuario->roles()->sync([$usuario->ROL_Codigo]);
    }

    public function create(){
        $rol = Role::pluck('ROL_Descripcion', 'ROL_Codigo');
        return view("admin.usuario.create", compact('rol'));
    }

    public function store(Request $request)
    {
        // Validate the request...
        /* Validacion del Formulario */
        $request->validate([
            'nombre' => 'required',
            'password' => 'required',
            're_password' => 'required',
            'email' => 'required|email',
            'rol' => 'required'
        ]);

        if($request->password != ''){
            if($request->password != $request->re_password){
                $request->validate([
                    'passwordNotEquals' => 'required'
                ]);
            }
        }
        $usuario = new User;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password =  Hash::make($request->password);
        $usuario->ROL_Codigo = $request->rol;
        $usuario->save();
/* esto es con la tabla pivote        $usuario->roles()->sync([$usuario->ROL_Codigo]); */

        return Redirect::to("/usuario");
    }

/*     public function store(Request $request){


        $request->validate([
            'nombre' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'rol' => 'required'
        ]);

        User::create([
            'name' => request('nombre'),
            'email' => request('email'),
            'password' => request('password'),
            'ROL_Codigo' => request('rol'),
        ]);

        $usuario = User::find('id');

        return Redirect::to("/usuario");
    } */

    public function show(User $usuario){

    }

    public function edit($id){
        $rol = Role::pluck('ROL_Descripcion', 'ROL_Codigo');
        $usuario = User::findOrFail($id);
        // var_dump($usuario);
        return view("admin.usuario.edit", ['usuario' => $usuario,'rol'=>$rol]);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        if($request->password != ''){
            if($request->password != $request->re_password){
                $request->validate([
                    'passwordNotEquals' => 'required'
                ]);
            }
        }

        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        if($request->password != ''){
            $usuario->password =  Hash::make($request->password);
        }
        $usuario->ROL_Codigo = $request->rol;
        $usuario->save();
/*         $usuario->roles()->sync([$usuario->ROL_Codigo]); */
        return Redirect::to("/usuario");
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);

        $user->flag_activo = !$user->flag_activo;
        $user->save();

        $cotizacion = Cotizacion::where('USUA_Codigo', '=', $id)->first();

        $mensaje = '';
        if($user->flag_activo){
            $mensaje = 'El usuario se activo con exito';
        }else{
            if($cotizacion != null){
                $mensaje = 'Este usuario tiene una o mas cotizaciones apropiadas por lo tanto la cuenta pasara a estar inactiva.';
            }
            $mensaje = 'Este usuario pasara al estado inactivo.';
        }

        return response()->json(['message' => $mensaje]);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return Redirect::to("/usuario");
    }
}
