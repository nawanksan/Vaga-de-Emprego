<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/vagasCandidatadas.css">
    <title>Minhas Inscrições</title>
</head>

<body>
    <header>
        <nav>
            <form action="/" method="get">
                @csrf
                <button id="btnSair" type="submit">Sair</button>
            </form><br>
            <form action="/validacao2Candidato/{{$id}}" method="get">
                @csrf
                <button id="btnSair" type="submit">Voltar</button>
            </form>
        </nav>
    </header>

    <main>
        <h2>Minhas Inscrições</h2>
        @foreach($dados as $vaga)
        <section id="minhasInscricoes">
            <ul>
                <!-- Exemplo de inscrição -->
                <li>
                    <h3>{{$vaga->titulo}}</h3>
                    <p>descricao: {{$vaga->descricao}}</p>
                    <p>requisitos: {{$vaga->requisitos}}</p>
                    <p>salario: R$ {{$vaga->salario}}</p>
                    <p>Status: {{$vaga->aprovado ? 'Aprovado' : 'Analise'}}</p>
                    <p>Empresa: {{$vaga->nome_empresa}}</p>
                    <p>Email: {{$vaga->email_empresa}}</p>
                    <p>Fone: {{$vaga->phone_empresa}}</p>

                </li>
                <!-- Adicione mais itens conforme necessário -->
            </ul>
        </section>
        @endforeach
    </main>
</body>

</html>