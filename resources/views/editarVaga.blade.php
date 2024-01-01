<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/homeEmpresa.css">
    <title>Tela Inicial da Empresa</title>
</head>

<body>
    <header>
        <nav>

            <form action="/">
                @csrf
                <button id="btnSair" type="submit">Sair</button>
            </form><br>
            <form action="/empresa/vagasOcupdas" method="post">
                @csrf
                <input style="display: none;" type="number" type="hidden" name="id_empresa" value="{{$id}}">
                <button id="btnVerVagas">Ver Vagas</button>
            </form>
        </nav>
    </header>

    <main>
        <section id="cadastroVaga">
            <h2>Editar Vaga</h2>
            <form action="{{ route('atualizarVaga', ['id' => $dados->id]) }}" method="post">
                @csrf
                @method('PUT')

                <input style="display: none;" type="number" type="hidden" name="id_empresa" value="{{$id}}">
                <input style="display: none;" type="number" type="hidden" name="id_vaga" value="{{$dados->id}}">

                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="{{$dados->titulo}}" required>

                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao"  required>{{$dados->descricao}}</textarea>

                <label for="requisitos">Requisitos:</label>
                <textarea id="requisitos" name="requisitos" required>{{$dados->requisitos}}</textarea>

                <label for="salario">Salário:</label>
                <input type="text" id="salario" name="salario" value="{{$dados->salario}}" required>

                <label for="totalCandidatos">Total de Candidatos:</label>
                <input type="number" id="total_candidatos" name="total_candidatos" min="1" value="{{$dados->total_candidatos}}" required>

                <button type="submit">Atualizar</button>
            </form>
        </section>
    </main>
    @if(session('msg'))
    <p>{{session('msg')}}</p>
    @endif
</body>

</html>