<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\empresas;
use Illuminate\Http\Request;

class admController extends Controller
{
    public function Confirmar(Request $request){

        $empresa = empresas::find($request->id_empresa);

        $empresa->aprovada = true;
        $empresa->save();

        return redirect()->route('validacao2Adm', ['id'=>$request->id_adm])->with('msg', 'Inscricão Confirmada');
    }


    public function todasAsEmpresas(Request $request){
        $empresas = empresas::all();

        return view('todasAsEmpresas', ['dados'=>$empresas, 'id'=>$request->id_adm]);
    }

}
