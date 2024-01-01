<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>Tela de Login</title>
</head>
<body>
    <div class="background-image">
        <div class="login-container">
            <div class="blur-background"></div>
            <div class="login-form">
                <h2>Login</h2>
                <form action="/validacao" method="post">
                    @csrf
                    <label for="username">Usuário:</label>
                    <input type="email" id="username" name="email" required>

                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Entrar</button>
                </form>

                <div class="register-options">
                    <a href="/cadastroCandidato">Cadastrar Candidato</a>
                    <a href="/cadastroEmpresa">Cadastrar Empresa</a>
                </div>
                @if(session('msg'))
                    <p>{{session('msg')}}</p>
                @endif
            </div>
            
        </div>
        
    </div>
</body>
</html>
