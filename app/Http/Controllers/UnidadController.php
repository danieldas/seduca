<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modelos\Unidad;
use App\Modelos\AsignacionUnidad;
use App\Modelos\Usuario;
use App\Http\Requests\StoreUnidad;
use DB;

class UnidadController extends Controller
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
   

        $unidades = Unidad::where([['Nombre', 'like', $param], ['Estado', '=', $param2]])
            ->paginate(20);

            return view('unidades.index', compact('unidades'));
    }

    public function asignacion($idUnidad)
    {
        $asignaciones = DB::table('vwasignacionunidad')
            ->select('*')
            ->Where('IdUnidad', '=', $idUnidad)
            ->orderBy('NombreCompleto')
            ->paginate(20);

        $usuarios = Usuario::select(DB::raw("CONCAT(Nombre,' ',Apellido) AS NombreUsuario"),'Cuenta')
                        ->orderBy('Nombre')
                                    ->pluck('NombreUsuario', 'Cuenta'); 
        $unidad = Unidad::findOrFail($idUnidad);

        return view('unidades.asignacion', compact('asignaciones', 'usuarios', 'unidad'));

    }

    public function storeAsignacion(Request $request)
    {      
        $valores = $request->all();
        $unidad = AsignacionUnidad::create($valores);
                  return redirect()
            ->route('unidades.asignacion', ['IdUnidad' => $unidad->FkUnidad])
            ->with('mensaje', 'El trabajador se ha asignado con éxito');
      
    }

     public function desasignar($IdAsignacion)
    {
            $asignacion = AsignacionUnidad::findOrFail($IdAsignacion);
           // dd($asignacion);
            $asignacion->delete();
            return redirect()
            ->route('unidades.asignacion', ['IdUnidad' => $asignacion->FkUnidad])
            ->with('mensajeRojo', 'El trabajador se ha desasignado con éxito');
       
        
    }
    public function registro()
    {
        return view('unidades.registro');
    }

    public function store(StoreUnidad $request)
    {      

        $valores = $request->all();
        $unidad = Unidad::create($valores);
                  return redirect()
            ->route('unidades.show', ['IdUnidad' => $unidad->IdUnidad])
            ->with('mensaje', 'La unidad se ha creado con éxito');
      
    }

    public function show($IdUnidad)
    {
        $unidad = Unidad::findOrFail($IdUnidad);
        return view('unidades.detalle', compact('unidad'));
    }


    public function edit($IdUnidad)
    {
        $unidad = Unidad::findOrFail($IdUnidad);
        return view('unidades.editar', compact('unidad'));
    }

   
    public function update(StoreUnidad $request, $IdUnidad)
    {  
        $unidad = Unidad::findOrFail($IdUnidad);
        $unidad->fill($request->all());
        $unidad->save();

        return redirect()->route('unidades.show', 
            ['IdUnidad' => $unidad->IdUnidad]
            )->with('mensaje', 'La unidad se ha modificado');
    }

    public function DarAlta($IdUnidad)
    {
        $unidad = Unidad::findOrFail($IdUnidad);
        $unidad->update(array('Estado' => 'Alta'));
        $unidad->save();
        //$unidad->delete();
        return redirect()->route('unidades.index')
            ->with('mensaje', 'Se ha dado de alta la unidad');
    }

    public function DarBaja($IdUnidad)
    {
        $unidad = Unidad::findOrFail($IdUnidad);
        $unidad->update(array('Estado' => 'Baja'));
        $unidad->save();
        return redirect()->route('unidades.index')
            ->with('mensajeRojo', 'Se ha dado de baja la unidad');
    }


}
