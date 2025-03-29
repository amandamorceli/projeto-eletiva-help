{{-- A IDEIA AQUI É CONSEGUIR FAZER AS ETAPAS DA RECUPERAÇÃO, NÃO PRECISA FAZER MUITA VERIFICAÇÃO SÓ POR CLICAR NO BOTÃO JÁ PODE ALTERAR SABE --}}

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
    <h3>Recuperação de senha</h3>
    <p>Digite seu e-mail para enviarmos um codigo de recuperação</p>
    
    <form method="POST" action="">

        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" class="form-control" name="email" placeholder="Digite seu email" required>
        </div>
        
        <div class="input-group mb-3 d-none">
            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
            <input type="text" class="form-control" name="codigo verificação" placeholder="Digite o código enviado" required>
        </div>

        <div class="input-group mb-3 d-none">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control" name="codigo verificação" placeholder="Digite a nova senha" required>
        </div>

        <div class="input-group mb-3 d-none">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control" name="codigo verificação" placeholder="Digite a senha novamente" required>
        </div>
        
        <button type="submit" class="btn btn-primary w-100 mt-3">Enviar código </button>

        <button type="submit" class="btn btn-primary w-100 mt-3 d-none">Verificar código </button>

        <button type="submit" class="btn btn-primary w-100 mt-3 d-none">Salvar senha </button>

    </form>

</div>
