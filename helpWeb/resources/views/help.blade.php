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
        flex-direction: row;
        /* Disposição lado a lado (menu + conteúdo) */
    }

    .nav-link:hover {
        background-color: #70377e;
    }

    /* Estilos da sidebar */
    .sidebar {
        width: 250px;
        background-color: #343a40;
        color: white;
        padding-top: 20px;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        overflow-y: auto;
    }

    .sidebar a {
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        display: block;
        margin: 5px 0;
    }

    .sidebar a:hover {
        background-color: #575757;
    }

    /* Estilos do conteúdo principal */
    .content-area {
        margin-left: 250px;
        /* Faz o conteúdo começar após a sidebar */
        flex: 1;
        /* Faz o conteúdo preencher o espaço restante */
        padding: 20px;
        overflow-y: auto;
    }

    /* Centraliza o conteúdo na tela */
    .container {
        display: flex;
        align-items: center;
        height: 100%;
        max-width: 98.5%;
        margin: 10px;
        flex-direction: column;
        padding: 20px;
    }
</style>

<body>

    <!-- menu tecnico -->
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4"><i class="fas fa-tools"></i> &nbsp; Painel</span>
        </a>
        <hr>
        @if(Auth::check())

            @if(Auth::check() && Auth::user()->tipo_usuario === 'T')
                <h6 class="text-uppercase text-secondary">Usuários</h6>
                <ul class="nav nav-pills flex-column">
                    
                    <li>
                        <a href="/usuarios/create" class="nav-link text-white">
                            <i class="fas fa-user-plus"></i> &nbsp; Inserir Usuário
                        </a>
                    </li>
                    
                    <li>
                        <a href="/usuarios/" class="nav-link text-white">
                            <i class="fas fa-users"></i> &nbsp; Usuários
                        </a>
                    </li>
                </ul>
                <hr>
            @endif
        
            <h6 class="text-uppercase text-secondary">Chamados</h6>

            <ul class="nav nav-pills flex-column mb-3">
                <li class="nav-item">
                    <a href="{{ route('chamados.create') }}" class="nav-link text-white">
                        <i class="fas fa-plus-circle"></i> &nbsp; Inserir Chamado
                    </a>
                </li>
                
                @if(Auth::check() && Auth::user()->tipo_usuario === 'U')
                    <li>
                        <a href="{{ route('meuschamados') }}" class="nav-link text-white">
                            <i class="fas fa-inbox"></i> &nbsp; Meus Chamados
                        </a>
                    </li>
                @endif

                @if(Auth::check() && Auth::user()->tipo_usuario === 'T')
                    <li>
                        <a href="/chamados" class="nav-link text-white">
                            <i class="fa-solid fa-globe"></i> &nbsp; Todos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('chamados.filtrar', '1') }}" class="nav-link text-white">
                            <i class="fas fa-inbox"></i> &nbsp; Novos Chamados
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('chamados.filtrar', '2') }}" class="nav-link text-white">
                            <i class="fas fa-calendar-check"></i> &nbsp; Em atendimento
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('chamados.filtrar', '3') }}" class="nav-link text-white">
                            <i class="fas fa-check-circle"></i> &nbsp; Em Validação
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('chamados.filtrar', '4') }}" class="nav-link text-white">
                            <i class="fa-solid fa-check"></i> &nbsp; Finalizados
                        </a>
                    </li>
                @endif
                
            </ul>
        @endif

        <hr>

        <ul class="nav nav-pills flex-column mb-3">
            <li>
                <a href="/" class="nav-link text-white">
                    <i class="fa-solid fa-arrow-left"></i> &nbsp; Sair
                </a>
            </li>
        </ul>
    </div>


    <!-- Content Area -->
    <div class="content-area">

        <div class="container">

            <!-- Conteúdo a ser carregado aqui -->
            @yield('conteudo')

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>