<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>Tela de Cadastro Candidato</title>
</head>
<body>
    <!-- Adicione esta parte ao seu arquivo HTML -->
<div class="register-container">
    <div class="background-image">
        <div class="login-container">
            <div class="blur-background"></div>
            <div class="login-form">
                <h2>Cadastro de Candidato</h2>
                <form action="/candidato/cadastro" method="post">
                    @csrf
                    <label for="firstName">Nome:</label>
                    <input type="text" id="firstName" name="nome" required>

                    <label for="lastName">Sobrenome:</label>
                    <input type="text" id="lastName" name="sobrenome" required>

                    <label for="phone">Telefone:</label>
                    <input type="tel" id="phone" name="phone" required>

                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Cadastrar</button>
                </form>

                <div class="back-to-login">
                    <a href="/">Voltar para o Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
