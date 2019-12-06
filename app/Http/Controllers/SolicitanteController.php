<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Solicitante;
use App\Modelos\Folio;
use App\Modelos\TipoTramite;
use App\Http\Requests\StoreSolicitante;
use App\Http\Requests\StoreFolio;
use App\Http\Requests\UpdateSolicitante;

use DB;

class SolicitanteController extends Controller
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

        $solicitantes = DB::table('vwsolicitante')
            ->select('*')
            ->orWhere([['NombreCompleto', 'like', $param], ['Estado', '=', $param2]])
            ->orWhere([['Ci', 'like', $param], ['Estado', '=', $param2]])
            ->orWhere([['Telefono', 'like', $param], ['Estado', '=', $param2]])

            ->orderBy('NombreCompleto')
            ->paginate(20);
        return view('solicitantes.index', compact('solicitantes'));
    }
  
    public function registro()
    {
        return view('solicitantes.registro');
    }

    public function store(StoreSolicitante $request)
    {   
        $valores = $request->all();

        $consulta = DB::table('Solicitante')
                ->select(DB::raw('count(*) as contador'))
                ->where('Ci', '=', $request->Ci)
                ->get();
        if ($consulta[0]->contador==0) 
        {
            $solicitante = Solicitante::create($valores);
                  return redirect()
            ->route('solicitantes.show', ['Ci' => $solicitante->Ci])
            ->with('mensaje', 'El solicitante se ha creado con éxito');
        }
        else
        {
            return redirect()
                ->route('solicitantes.registro')
                ->withErrors([
                    'registro' => 'El carnet ya existe'
                    ])
                ->withInput([
                    'Nombre' => $request->input('Nombre'),
                    'ApPaterno' => $request->input('ApPaterno'),
                    'ApMaterno' => $request->input('ApMaterno'),
                    'Telefono' => $request->input('Telefono'),
                    'Tipo' => $request->input('Tipo'),
                    ]);
        }
      
    }

    public function registroFolio($Ci)
    {
        $folios = DB::table('vwfoliotipo')
            ->select('*')
            ->Where('FkSolicitante', '=', $Ci)
            

            ->orderBy('Fecha')
            ->paginate(20);

        $tramites = TipoTramite::select('Nombre','IdTipoTramite')
                                    ->pluck('Nombre', 'IdTipoTramite'); 

        return view('solicitantes.registroFolio', compact('tramites', 'Ci', 'folios'));
    }

    public function storeFolio(StoreFolio $request)
    {   
        $valores = $request->all();
        $valores['Fecha'] =date("Y-m-d H:i:s");
       
            $folio = Folio::create($valores);
                  return redirect()
            ->route('solicitantes.registroFolio', ['Ci' => $folio->FkSolicitante])
            ->with('mensaje', 'El folio se ha creado con éxito');
 
      
    }


    public function show($Ci)
    {
        $solicitante = Solicitante::findOrFail($Ci);
        return view('solicitantes.detalle', compact('solicitante'));
    }


    public function edit($Ci)
    {
        $solicitante = Solicitante::findOrFail($Ci);
        return view('solicitantes.editar', compact('solicitante'));
    }

   
    public function update(UpdateSolicitante $request, $Ci)
    {  
        $solicitante = Solicitante::findOrFail($Ci);
        $solicitante->fill($request->all());
        $solicitante->save();

        return redirect()->route('solicitantes.show', 
            ['Ci' => $solicitante->Ci]
            )->with('mensaje', 'El solicitante se ha modificado');
    }

    public function DarAlta($Ci)
    {
        $solicitante = Solicitante::findOrFail($Ci);
        $solicitante->update(array('Estado' => 'Alta'));
        $solicitante->save();
        return redirect()->route('solicitantes.index')
            ->with('mensaje', 'Se ha dado de alta el solicitante');
    }

    public function DarBaja($Ci)
    {
        $solicitante = Solicitante::findOrFail($Ci);
        $solicitante->update(array('Estado' => 'Baja'));
        $solicitante->save();
        return redirect()->route('solicitantes.index')
            ->with('mensajeRojo', 'Se ha dado de baja el solicitante');
    }

}

 