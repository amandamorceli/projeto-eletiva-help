@extends('help')

<style>
    .container {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 0px 12px 0px #333333;
    }
</style>
@section('conteudo')
<h3 class="mb-4">Lista de Chamados</h3>

<div class="table-responsive">

    <table class="table table-bordered table-hover table-striped">

        <thead class="table-dark">
            <tr>
                <th>&nbsp</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Solicitante</th>
                <th>Técnico</th>
                <th>Categoria</th>
                <th>Status</th>
                <th>Data de Inclusão</th>
                <th>&nbsp</th>
            </tr>
        </thead>
        <tbody>

            @foreach($chamados as $chamado)

            <tr>
                <td><a href="/chamados/{{ $chamado->id }}/edit"><i class='fas fa-edit'></i></a></td>
                <td>{{ $chamado->titulo}}</td>
                <td>{{ $chamado->descricao}}</td>
                <td>{{ $chamado->n_cod_solicitante}}</td>
                <td>{{ $chamado->n_cod_tecnico}}</td>
                <td>{{ $chamado->n_categoria}}</td>
                <td><span class="badge bg-warning text-dark">{{ $chamado->f_status}}</span></td>
                <td>{{ $chamado->d_inclusao}}</td>
                <td><a href="/chamados/{{ $chamado->id }}"><i class="fa-solid fa-eye"></i></a></td>
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