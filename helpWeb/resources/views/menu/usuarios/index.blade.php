@extends('help')

<style>

    .container{
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 0px 12px 0px #333333;
    }
    .icones{
        font-size: 1.2rem;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: space-around;
        align-items: center;
    }
    td{
        vertical-align: middle !important;
    }

</style>
@section('conteudo')
<h3 class="mb-4">Lista de Usuários</h3>

<div class="table-responsive" style="width: 90%;">

    <table class="table table-bordered table-hover table-striped">
        
        <thead class="table-dark">
            <tr>
                <th style="width: 5%">&nbsp</th>
                <th style="width: 20%">Login</th>
                <th style="width: 15%">Nome Resumido</th>
                <th style="width: 25%">Tipo Usuário</th>
                <th style="width: 20%">Data Início</th>
                <th style="width: 12%">Data Inclusão</th>
            </tr>
        </thead>
        <tbody>

            @foreach($usuarios as $u)

            <tr>
                <td><a href="/usuarios/{{ $u->id }}/edit"><i class='fas fa-edit'></i></a></td>
                <td>{{ $u->c_login}}</td>
                <td>{{ $u->c_nome_resumido}}</td>
                <td>{{ $u->f_tipo_usuario == "T" ? "Técnico" : "Usuário"}}</td>
                <td>{{ $u->d_inicio}}</td>
                <td>{{ $u->d_inclusao}}</td>
                <td><a href="/usuarios/{{ $u->id }}"><i class='fas fa-eye'></i></a></td>
            </tr>

            @endforeach
            
        </tbody>
    </table>

    @if(session('erro'))
    <div class="alert alert-danger">
        {{ session('erro') }}
    </div>
    @endif

    @if(session('sucesso'))
    <div class="alert alert-success">
        {{ session('sucesso') }}
    </div>
    @endif
</div>
@endsection