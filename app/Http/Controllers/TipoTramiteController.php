<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Solicitante;
use App\Modelos\Folio;
use App\Modelos\TipoTramite;
use App\Http\Requests\StoreTramite;

use DB;

class TipoTramiteController extends Controller
{

    public function index(Request $request)
    {
        
        $param = $request-> input('buscar');
        $param = "%$param%";

        $tramites = TipoTramite::where('Nombre', 'like', $param)
            ->orWhere('TiempoAprox', 'like', $param)
            ->orderBy('Nombre')
            ->paginate(20);
        return view('tipotramites.index', compact('tramites'));
    }
  


    public function store(StoreTramite $request)
    {   
        $valores = $request->all();

        $tramite = TipoTramite::create($valores);
            return redirect()
            ->route('tipotramites.show', ['IdTipoTramite' => $tramite->IdTipoTramite])
            ->with('mensaje', 'El trámite se ha creado con éxito');
              
    }

    public function show($IdTipoTramite)
    {
        $tramite = TipoTramite::findOrFail($IdTipoTramite);

       // dd($tramite);
        return view('tipotramites.detalle', compact('tramite'));


    }


    public function edit($IdTipoTramite)
    {

        $tramite = TipoTramite::findOrFail($IdTipoTramite);
        return view('tipotramites.editar', compact('tramite'));
    }

   
    public function update(StoreTramite $request, $IdTipoTramite)
    {  
        $tramite = TipoTramite::findOrFail($IdTipoTramite);
        $tramite->fill($request->all());
        $tramite->save();

        return redirect()->route('tipotramites.show', 
            ['IdTipoTramite' => $tramite->IdTipoTramite]
            )->with('mensaje', 'El trámite se ha modificado');
    }


}

 