<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\candidatos;
use App\Models\empresas;
use App\Models\vagas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class empresaController extends Controller
{
    public function cadastrar(Request $request)
    {

        // Verificar se o e-mail não existe nas tabelas candidatos e empresas
        $emailExisteCandidatos = candidatos::where('email', $request->email)->exists();
        $emailExisteEmpresas = empresas::where('email', $request->email)->exists();

        if (!$emailExisteCandidatos && !$emailExisteEmpresas) {
            // Se o e-mail não existir, cadastrar o candidato
            empresas::create([
                'nome' => $request->nome,
                'email' => $request->email,
                'telefone' => $request->phone,
                'senha' => Hash::make($request->password),
                'setor' => $request->setor,
            ]);

            // Você pode redirecionar para a tela de login ou fazer qualquer outra ação necessária
            return redirect('/')->with('msg', 'Aguarde 5 minutos para a confirmação de sua conta!');
        } else {
            // Se o e-mail existir, redirecionar para a tela de login
            return redirect('/')->with('msg', 'O e-mail já está cadastrado. Faça login.');
        }
    }

    public function cadastrarVaga(Request $request)
    {
        vagas::create([
            'id_empresa'=>$request->id_empresa,
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'requisitos' => $request->requisitos,
            'salario' => $request->salario,
            'total_candidatos'=> $request->total_candidatos
        ]);


        return redirect()->route('validacao2Empresa', ['id'=>$request->id_empresa])->with('msg', 'Cadastrada');
    }


    public function vagasOcupadas(Request $request){
        $id = $request->id_empresa;

        $dados = vagas::select('vagas.*', 'candidatos.*', 'inscricoes.aprovado')
        ->join('inscricoes', 'vagas.id', '=', 'inscricoes.id_vaga')
        ->join('candidatos', 'candidatos.id', '=', 'inscricoes.id_candidato')
        ->where('inscricoes.aprovado', '=', true)
        ->where('vagas.id_empresa', '=', $id)
        ->get();
    

        return view('vagasOcupadas', ['dados'=>$dados, 'id'=>$id]);
    }


    public function todasAsVagas($id){
        

        $dados = DB::table('vagas')
        ->select('vagas.*', 'empresas.nome as nome_empresa', DB::raw('(SELECT MAX(aprovado) FROM inscricoes WHERE id_vaga = vagas.id) as aprovado'))
        ->join('empresas', 'vagas.id_empresa', '=', 'empresas.id')
        ->where('empresas.id', '=', $id) // Filtrar por ID da empresa específica
        ->orWhereNull(DB::raw('(SELECT MAX(aprovado) FROM inscricoes WHERE id_vaga = vagas.id)')) // Incluir vagas não aprovadas
        ->distinct() // Evitar linhas duplicadas
        ->get();
    
    
    

        return view('todasAsvagas', ['dados'=>$dados, 'id'=>$id]);
    }

    public function deletarVaga(Request $request){
        $dados = vagas::find($request->id_vaga);

        if($dados){
            $dados->delete();
            return redirect()->route('todasAsVagas', ['id'=>$request->id_empresa]);
        }else{
            return redirect()->route('todasAsVagas', ['id'=>$request->id_empresa]);
        }
    }

    public function editarVaga(Request $request){
        $id = $request->id_vaga;

        $vaga = vagas::findOrFail($id);

        return view('editarVaga', ['dados'=>$vaga, 'id'=>$request->id_empresa]);
    }

    public function atualizarVaga(Request $request){

        vagas::findOrFail($request->id_vaga)->update($request->all());

        return redirect()->route('todasAsVagas', ['id'=>$request->id_empresa]);
    }
    
}
