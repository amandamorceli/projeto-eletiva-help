<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Help</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> -->
    @yield('css')
</head>

<style>

    body {
        height: 100vh;
        width: 100vw;
        background: linear-gradient(166deg, #70377e, #a474af, #d5c5d8);
        margin: 0;
        display: flex;
        flex-direction: row; /* Disposição lado a lado (menu + conteúdo) */
    }

    .content-area {
        margin-left: 0px; /* Faz o conteúdo começar após a sidebar */
        flex: 1; /* Faz o conteúdo preencher o espaço restante */
        padding: 20px;
        overflow-y: hi;
    }

    /* Centraliza o conteúdo na tela */
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        max-width: 98.5%;
        margin: 10px;
        flex-direction: column;
        padding: 20px;
    }

    .login-container {
        background: rgba(255, 255, 255, 0.9);
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
        width: 100%;
        max-width: 400px;
        color: black;
    }
    .login-container h3 {
        margin-bottom: 1.5rem;
    }
    .input-group-text {
        background: #6a11cb;
        color: white;
    }
    .btn-primary {
        background: #6a11cb;
        border: none;
    }
    .btn-primary:hover {
        background: #2575fc;
    }
</style>

<body>
    
    <div class="content-area">

        <div class="container">

            <div class="login-container">
                <h3><i class="fas fa-user-circle"></i> Bem-vindo</h3>
                <p>Acesse sua conta para continuar</p>
                
                <form method="POST" action="">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" name="c_login" placeholder="Digite seu login" required>
                    </div>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" name="c_senha" placeholder="Digite sua senha" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 mt-3">Entrar <i class="fas fa-sign-in-alt"></i></button>
                </form>
                
                <p class="mt-3"><a href="" class="text-decoration-none">Esqueceu sua senha?</a></p>
            </div>
        </div>

    </div> 

</body>

