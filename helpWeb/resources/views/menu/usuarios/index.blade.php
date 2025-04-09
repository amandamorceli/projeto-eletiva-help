@extends('help')

<style>

    .container{
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 0px 12px 0px #333333;
    }

</style>
@section('conteudo')
<h3 class="mb-4">Lista de Usuários</h3>

<div class="table-responsive">

    <table class="table table-bordered table-hover table-striped">
        
        <thead class="table-dark">
            <tr>
                <th>&nbsp</th>
                <th>Login</th>
                <th>Nome Resumido</th>
                <th>Tipo Usuário</th>
                <th>Data Início</th>
                <th>Data Inclusão</th>
            </tr>
        </thead>
        <tbody>

            @foreach($usuarios as $u)

            <tr>
                <td><i class='fas fa-edit'></i></td>
                <td>{{ $u->c_login}}</td>
                <td>{{ $u->c_nome_resumido}}</td>
                <td>{{ $u->f_tipo_usuario}}</td>
                <td>{{ $u->d_inicio}}</td>
                <td>{{ $u->d_inclusao}}</td>
            </tr>

            @endforeach
            
        </tbody>
    </table>
</div>
@endsection