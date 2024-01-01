<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/homeAdm.css">
    <title>Empresas Cadastradas</title>
</head>

<body>
    <header>
        <h1>Administração</h1>
        <nav>
            <a href="/"><button id="btnSair">Sair</button></a>
        </nav>

        <nav>
            <a href="/validacao2Adm/{{$id}}"><button id="btnSair">Voltar</button></a>

        </nav>
    </header>

    <main>
        <h2>Empresas Cadastradas Recente</h2>

        @if(session('msg'))
        <p>{{session('msg')}}</p>
        @endif

        @foreach($dados as $empresa)
        <section id="empresasCadastradas">

            <ul>
                <li>
                    <h3>{{$empresa->nome}}</h3>
                    <p>Setor: {{$empresa->setor}}</p>
                    <p>Email: {{$empresa->email}}</p>
                    <p>Número: {{$empresa->telefone}}</p>
                    <p>Status: {{$empresa->aprovada ? 'Aprovada' : 'Análise'}}</p>
                </li>
            </ul>

            <!-- <form action="/adm/confirmacao" method="post">
                    @csrf
                    <input style="display: none;" type="number" type="hidden" name="id_adm" value="{{$id}}">
                    <input style="display: none;" type="number" type="hidden" name="id_empresa" value="{{$empresa->id}}">
                    <button type="submit">Confirmar inscrição</button>
                </form> -->
        </section>
        @endforeach
    </main>
</body>

</html>