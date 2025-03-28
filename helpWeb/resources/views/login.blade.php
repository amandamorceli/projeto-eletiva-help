{{-- <form class="w-50 h-75 d-flex flex-column align-items-center shadow-sm p-3 bg-white rounded">

    <div class="apresentacao">
        <h3>Bem vindo</h3>
    </div>

    <div class="form-group w-50 m-2 mt-5">
        <label for="login" class="mb-1">Login de Acesso</label>
        <input type="email" class="form-control" id="login" aria-describedby="loginHelp"
            placeholder="Login">
    </div>

    <div class="form-group w-50 m-2">
        <label for="senha" class="mb-1">Senha</label>
        <input type="password" class="form-control" id="senha" placeholder="Senha">
    </div>

    <div class="form-group form-check w-50">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Clique em mim</label>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>

</form>
 --}}

<style>
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

<div class="login-container">
    <h3><i class="fas fa-user-circle"></i> Bem-vindo</h3>
    <p>Acesse sua conta para continuar</p>
    
    <form method="POST" action="">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="email" class="form-control" name="email" placeholder="Digite seu login" required>
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control" name="password" placeholder="Digite sua senha" required>
        </div>
        
        <button type="submit" class="btn btn-primary w-100 mt-5">Entrar <i class="fas fa-sign-in-alt"></i></button>
    </form>
    
    <p class="mt-3"><a href="" class="text-decoration-none">Esqueceu sua senha?</a></p>
</div>
