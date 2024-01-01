<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/homeCandidato.css">
    <title>Tela Inicial do Candidato</title>
</head>

<body>
    <header>
        <div class="container">
            <h1>Tela Inicial</h1>
            <div class="user-info">
                <span>{{$nome}} {{$sobrenome}}</span><br>
                <form action="/candidato/vagasCandidatas" method="post">
                    @csrf
                    <input style="display: none;" type="number" type="hidden" name="id_candidato" value="{{$id}}">
                    <button type="submit">Vagas Inscritas</button>
                </form>
                    <a href="/"><button type="submit">Sair</button></a>
            </div>
        </div>
    </header>
    <h2>Vagas de Emprego</h2>


    <main class="container">
        @foreach($dados as $vaga)
            <section class="job-opportunities">

                <!-- Exibindo informações da vaga -->
                <div class="job-info">
                    <h3>{{$vaga->titulo}}</h3>
                    <p>descricao: {{$vaga->descricao}}</p>
                    <p>Requisitos: {{$vaga->requisitos}}</p>
                    <p>Salário: R$ {{$vaga->salario}}</p>
                    <p>Empresa: {{$vaga->nome_empresa}}</p>
                    <p>Email: {{$vaga->email_empresa}}</p>
                    <p>Telefone: {{$vaga->phone_empresa}}</p>
                    <!-- Botão de Inscrição -->
                    <form action="/candidato/inscrever" method="post">
                        @csrf
                        <input style="display: none;" type="number" type="hidden" name="id_candidato" value="{{$id}}">
                        <input style="display: none;" type="number" type="hidden" name="id_vaga" value="{{$vaga->id}}">
                        <button type="submit">Inscrever-se</button>
                    </form>
                    

                </div>  
            </section>
        @endforeach
    </main>

</body>

</html>