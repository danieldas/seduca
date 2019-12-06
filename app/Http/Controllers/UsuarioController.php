<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Usuario;
use App\Http\Requests\StorePass;
use App\Http\Requests\StoreUsuario;
use App\Http\Requests\UpdateUsuario;

use DB;

class UsuarioController extends Controller
{


    public function index(Request $request)
    {
        $param2 = $request->input('estado');
        if($param2 == null)
        {
            $param2='Alta';
        }
        $param = $request-> input('buscar');
        $param = "%$param%";
        $param2 = "%$param2%";
        $usuarios = Usuario::where([['Cuenta', 'like', $param], ['Estado', 'like', $param2]])
            ->orWhere([['Nombre', 'like', $param],['Estado', 'like', $param2]])
            ->orWhere([['Apellido', 'like', $param],['Estado', 'like', $param2]])
            ->orderBy('Apellido')
            ->paginate(20);
        return view('usuarios.index', compact('usuarios'));
    }
  
    public function registro()
    {
        return view('usuarios.registro');
    }

    public function store(StoreUsuario $request)
    {      

        $valores = $request->all();

        $consulta = DB::table('Usuario')
                ->select(DB::raw('count(*) as contador'))
                ->where('Cuenta', '=', $request->Cuenta)
                ->get();
        if ($consulta[0]->contador==0) 
        {

            $usuario = Usuario::create($valores);
                  return redirect()
            ->route('usuarios.show', ['Cuenta' => $usuario->Cuenta])
            ->with('mensaje', 'El usuario se ha creado con éxito');
        }
        else
        {
            return redirect()
                ->route('usuarios.registro')
                ->withErrors([
                    'registro' => 'La cuenta ya existe'
                    ])
                ->withInput([
                    'Nombre' => $request->input('Nombre'),
                    'Apellido' => $request->input('Apellido'),
                    'Ci' => $request->input('Ci'),
                    'Rol' => $request->input('Rol'),
                    ]);
        }
      
    }

    public function show($Cuenta)
    {
        $usuario = Usuario::findOrFail($Cuenta);
        return view('usuarios.detalle', compact('usuario'));
    }


    public function edit($Cuenta)
    {
        $usuario = Usuario::findOrFail($Cuenta);
        return view('usuarios.editar', compact('usuario'));
    }

   
    public function update(UpdateUsuario $request, $Cuenta)
    {  
        $usuario = Usuario::findOrFail($Cuenta);
        $usuario->fill($request->all());
        $usuario->save();

        return redirect()->route('usuarios.show', 
            ['Cuenta' => $usuario->Cuenta]
            )->with('mensaje', 'El usuario se ha modificado');
    }

    public function DarAlta($Cuenta)
    {
        $usuario = Usuario::findOrFail($Cuenta);
        $usuario->update(array('Estado' => 'Alta'));
        $usuario->save();
        //$usuario->delete();
        return redirect()->route('usuarios.index')
            ->with('mensaje', 'Se ha dado de alta el usuario');
    }

    public function DarBaja($Cuenta)
    {
        $usuario = Usuario::findOrFail($Cuenta);
        $usuario->update(array('Estado' => 'Baja'));
        $usuario->save();
        return redirect()->route('usuarios.index')
            ->with('mensajeRojo', 'Se ha dado de baja el usuario');
    }



    
    public function login()
    {
        return view('usuarios.login');
    }

    public function logear(Request $request)
    {
        $userPass= $request-> input('password');
        $userCuenta = $request-> input('Cuenta');
      //  dd($userCuenta);
        if ( auth()->attempt(['Cuenta' => $userCuenta, 'password' => $userPass, 'Estado' => 'Alta']) )
        {
            return redirect()
                ->route('plantillas.principal');
        }
        else
        { 
            return redirect()
                ->route('usuarios.login')
                ->withErrors([
                    'login' => 'Cuenta o password incorrectos'
                    ])
                ->withInput([
                    'Cuenta' => $request->input('Cuenta'),
                    ]);   
        }             
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('usuarios.login');
    }
    public function home()
    {
        return view('plantillas.principal');
    }

    public function editarPass($cuenta)
    {
        $usuario = Usuario::findOrFail($cuenta);
        return view('usuarios.editarPass', compact('usuario'));
    }

    public function actualizarPass(StorePass $request, $cuenta)
    {
        $clave = $request->input('clave');

        if ( auth()->attempt(['Cuenta' => $cuenta, 'password' => $clave]) )
        {
            $usuario = Usuario::findOrFail($cuenta);
            $usuario->fill($request->all());
            $usuario->save();

            return redirect()->route('minerales.home')->with('mensaje', 'El password se ha modificado');
        }
        else
        {              
            echo  "<script>
               history.go(-1);
               alert('El password actual no es el correcto');
                </script>";
        }      

    }

    public function CambiarPass($cuenta)
    {
        $usuario = Usuario::findOrFail($cuenta);
        return view('usuarios.cambiarPass', compact('usuario'));
    }
    public function updatePass(StorePass $request, $cuenta)
    {
        $usuario = Usuario::findOrFail($cuenta);
        $usuario->fill($request->all());
        $usuario->save();

        return redirect()->route('usuarios.show', 
            ['id' => $usuario->Cuenta]
            )->with('mensaje', 'El password se ha modificado');
      // return view('usuarios.cambiarPass', compact('usuario'));
    }


}

 