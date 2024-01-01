<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\candidatos;
use App\Models\empresas;
use App\Models\vagas;
use App\Models\inscricoes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    public function validacao(Request $request)
    {

        if ($request->email == 'kawan@gmail.com' and $request->password == 1234) {
            $dados = empresas::where('aprovada', false)->get();
            $id_adm = 1024;

            return view('homeAdm', ['dados' => $dados, 'id' => $id_adm, 'nome' => 'Kawan Nascimento Santos']);
        } else {
            $usuarioTipoA = candidatos::where('email', $request->email)->first();
            $usuarioTipoB = empresas::where('email', $request->email)->first();

            if ($usuarioTipoA && Hash::check($request->password, $usuarioTipoA->senha)) {
                $candidatoId = $usuarioTipoA->id;

                $dados = vagas::select('vagas.*', 'empresas.nome as nome_empresa', 'empresas.email as email_empresa', 'empresas.telefone as phone_empresa')
                ->join('empresas', 'vagas.id_empresa', '=', 'empresas.id')
                ->whereNotIn('vagas.id', function ($query) use ($candidatoId) {
                    $query->select('id_vaga')
                        ->from('inscricoes')
                        ->where('id_candidato', $candidatoId);
                })
                ->get();
                
                return view('homeCandidato', ['id' => $candidatoId, 'dados' => $dados, 'nome' => $usuarioTipoA->nome, 'sobrenome' => $usuarioTipoA->sobrenome]);
            } elseif ($usuarioTipoB && Hash::check($request->password, $usuarioTipoB->senha) && $usuarioTipoB->aprovada == true) {
                return view('homeEmpresa', ['nome' => $usuarioTipoB->nome, 'id' => $usuarioTipoB->id]);
            } else {
                return back()->with('msg', 'Dados inválidos');
            }
        }
    }

    public function validacao2Empresa($id)
    {
        $empresa = empresas::find($id);

        return view('/homeEmpresa', ['nome' => $empresa->nome, 'id' => $empresa->id]);
    }


    public function validacao2Candidato($id)
    {
        $candidato = candidatos::find($id);

        $dados = vagas::whereNotIn('id', function ($query) use ($id) {
            $query->select('id_vaga')
                ->from('inscricoes')
                ->where('id_candidato', $id);
        })->get();

        return view('/homeCandidato', ['dados' => $dados, 'nome' => $candidato->nome, 'sobrenome' => $candidato->sobrenome, 'id' => $candidato->id]);
    }

    public function validacao2Adm($id)
    {


        if ($id == 1024) {
            $dados = empresas::where('aprovada', false)->get();

            return view('homeAdm', ['dados' => $dados, 'id' => $id, 'nome' => 'Kawan Nascimento Santos']);
        }
    }
}
