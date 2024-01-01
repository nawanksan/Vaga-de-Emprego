<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/todasAsVagas.css">
  <title>Vagas Ocupadas pela Empresa</title>
</head>

<body>
  <header>
    <nav>
      <form action="/">
        @csrf
        <button id="btnSair" type="submit">Sair</button>
      </form><br>
      <a href="/validacao2Empresa/{{$id}}"><button id="btnVerVagas" type="submit">Voltar</button></a>
      

    </nav>
  </header>

  <main>
    <h2>Todas as Vagas</h2>
    @foreach($dados as $vaga)
        <section id="vagasOcupadas">

        <ul>
            <li>
            <h3>{{$vaga->titulo}}</h3>
            <p>requisito: {{$vaga->requisitos}}</p>
            <p>descricao: {{$vaga->descricao}}</p>
            <p>Salário: R$ {{$vaga->salario}}</p>
            <p>Status: {{$vaga->aprovado ? 'Ocupada' : 'Disponivel'}}</p>
            
            @if(!$vaga->aprovado)
            <form action="/empresa/deletarVaga" method="post">
                @csrf
                <input style="display: none;" type="number" type="hidden" name="id_vaga" value="{{$vaga->id}}">
                <input style="display: none;" type="number" type="hidden" name="id_empresa" value="{{$id}}">
                <button type="submit" id="btnVerVagas">Deletar</button>
            </form><br>
            @endif
            <form action="/empresa/editarVaga" method="post">
                @csrf
                <input style="display: none;" type="number" type="hidden" name="id_vaga" value="{{$vaga->id}}">
                <input style="display: none;" type="number" type="hidden" name="id_empresa" value="{{$id}}">
                <button type="submit" id="btnVerVagas">Editar</button>
            </form>
            </li>
        </ul>
        </section>
    @endforeach
  </main>
</body>

</html>