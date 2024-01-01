<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/cadastroEmpresa.css">
    <title>Cadastro de Empresa</title>
</head>

<body>
    <div class="background"></div>
    <div class="form-container">
        <h2>Cadastro de Empresa</h2>
        <form action="/empresa/cadastro" method="post">
            @csrf
            <label for="nome">Nome da Empresa:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="setor">Setor:</label>
            <input type="text" id="setor" name="setor" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="numero">Número de Contato:</label>
            <input type="tel" id="numero" name="phone" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="password" required>

            <button type="submit">Cadastrar</button>
        </form>
        <div class="back-to-login">
            <a href="/">Voltar para o Login</a>
        </div>
    </div>
</body>

</html>