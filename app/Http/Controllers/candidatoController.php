<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\candidatos;
use App\Models\empresas;
use App\Models\inscricoes;
use App\Models\vagas;
use Illuminate\Support\Facades\Hash;

class candidatoController extends Controller
{
    public function cadastrar(Request $request)
    {

        // Verificar se o e-mail não existe nas tabelas candidatos e empresas
        $emailExisteCandidatos = candidatos::where('email', $request->email)->exists();
        $emailExisteEmpresas = empresas::where('email', $request->email)->exists();

        if (!$emailExisteCandidatos && !$emailExisteEmpresas) {
            // Se o e-mail não existir, cadastrar o candidato
            candidatos::create([
                'nome' => $request->nome,
                'sobrenome' => $request->sobrenome,
                'telefone' => $request->phone,
                'email' => $request->email,
                'senha' => Hash::make($request->password),
            ]);

            // Você pode redirecionar para a tela de login ou fazer qualquer outra ação necessária
            return redirect('/')->with('msg', 'Candidato cadastrado com sucesso!');
        } else {
            // Se o e-mail existir, redirecionar para a tela de login
            return redirect('/')->with('msg', 'O e-mail já está cadastrado. Faça login.');
        }
    }


    public function VagasCandidatas(Request $request)
    {
        $id = $request->id_candidato;
        $dados = vagas::select('vagas.*', 'inscricoes.aprovado', 'empresas.nome as nome_empresa', 'empresas.email as email_empresa', 'empresas.telefone as phone_empresa')
        ->join('inscricoes', function ($join) use ($id) {
            $join->on('vagas.id', '=', 'inscricoes.id_vaga')
                ->where('inscricoes.id_candidato', '=', $id);
        })
        ->join('empresas', 'vagas.id_empresa', '=', 'empresas.id')
        ->get();

        return view('vagasCandidatadas', ['id' => $id, 'dados' => $dados]);
    }


    public function inscricao(Request $request)
    {


        $idVaga = $request->id_vaga;

        $inscricao = new inscricoes();
        $inscricao->id_candidato = $request->id_candidato;
        $inscricao->id_vaga = $idVaga;
        $inscricao->save();

        // Verificar o número de candidatos permitidos
        $vaga = vagas::findOrFail($idVaga);
        $numeroMaximoCandidatos = $vaga->total_candidatos;

        // Verificar o número atual de candidatos inscritos
        $candidatosInscritos = inscricoes::where('id_vaga', $idVaga)->count();

        // Realizar a inscrição
       

        // Verificar se atingiu o número máximo de candidatos
        if ($candidatosInscritos == $numeroMaximoCandidatos) {
            if ($numeroMaximoCandidatos == 1) {
                // Se a vaga aceita apenas um candidato, aprova automaticamente
                $inscricao->update(['aprovado' => true]);
            } else {
                // Sorteio para aprovar um candidato
                $candidatoSorteado = inscricoes::where('id_vaga', $idVaga)->inRandomOrder()->first();
                $candidatoSorteado->update(['aprovado' => true]);
            }
        }

        return redirect()->route('validacao2Candidato', ['id'=>$request->id_candidato]);
        
    }
}
