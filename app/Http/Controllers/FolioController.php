<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Solicitante;
use App\Modelos\Folio;
use App\Modelos\TipoTramite;

use App\Http\Requests\StoreFolio;


use DB;

class FolioController extends Controller
{

    public function index(Request $request)
    {
        $param2 = $request->input('estado');
        if($param2 == null)
        {
            $param2='Pendiente';
        }
        $param = $request-> input('buscar');
        $param = "%$param%";

        $folios = DB::table('vwfoliosolicitante')
            ->select('*')
            ->orWhere([['NombreCompleto', 'like', $param], ['EstadoFolio', '=', $param2]])
            ->orWhere([['Ci', 'like', $param], ['EstadoFolio', '=', $param2]])
            ->orWhere([['NombreTramite', 'like', $param], ['EstadoFolio', '=', $param2]])

            ->orderBy('Fecha')
            ->paginate(20);
        return view('folios.index', compact('folios'));
    }
  
    

    public function show($IdFolio)
    {
        $folio = DB::table('vwfoliosolicitante')
            ->select('*')
            ->where('IdFolio', '=', $IdFolio)
            ->get();
        $folio=$folio[0];

        return view('folios.detalle', compact('folio'));
    }


    public function edit($IdFolio)
    {
        $tramites = TipoTramite::select('Nombre','IdTipoTramite')
                                    ->pluck('Nombre', 'IdTipoTramite'); 
        $folio = Folio::findOrFail($IdFolio);
        return view('folios.editar', compact('folio', 'tramites'));
    }

   
    public function update(StoreFolio $request, $IdFolio)
    {  
        $folio = Folio::findOrFail($IdFolio);
        $folio->fill($request->all());
        $folio->save();

        return redirect()->route('folios.show', 
            ['IdFolio' => $folio->IdFolio]
            )->with('mensaje', 'El folio se ha modificado');
    }

    public function EliminarFolio(Request $request)
    {
        $valores = $request->all();

        $Password = $request->input('Password');
        $Cuenta = $request->input('Cuenta');
        $IdFolio = $request->input('id');
        if ( auth()->attempt(['Cuenta' => $Cuenta, 'password' => $Password]) )
        {
            $folio = Folio::findOrFail($IdFolio);
            $folio->delete();
            return redirect()->route('folios.index')
            ->with('mensajeRojo', 'Se ha eliminado el folio');
        } 
        else
        {
            return redirect()->route('folios.index')
            ->with('mensajeRojo', 'No se pudo eliminar, debido al ingreso incorrecto del password');
        }
        
    }

}

 