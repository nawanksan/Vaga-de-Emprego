<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/vagasOcupadas.css">
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
        
        <a href="/empresa/todasAsVagas/{{$id}}"><button id="btnVerVagas" type="submit">Ver todas as Vagas</button></a>

    </nav>
  </header>

  <main>
    <h2>Vagas Ocupadas</h2>
    @foreach($dados as $vaga)
    <section id="vagasOcupadas">

      <ul>
        <li>
          <h3>{{$vaga->titulo}}</h3>
          <p>{{$vaga->requisitos}}</p>
          <p>{{$vaga->descricao}}</p>
          <p>Salário: R$ {{$vaga->salario}}</p>
          <p>Status: {{$vaga->aprovado ? 'Ocupada' : 'Disponivel'}}</p>
          <p>Candidato: {{$vaga->nome_candidato}}</p>
          <p>Email: {{$vaga->email}}</p>

        </li>
      </ul>
    </section>
    @endforeach
  </main>
</body>

</html>