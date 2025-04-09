@extends('help')

<style>

    .container{
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
            </tr>
        </thead>
        <tbody>

            @foreach($chamados as $c)

            <tr>
                <td><i class='fas fa-edit'></i></td>
                <td>{{ $c->titulo}}</td>
                <td>{{ $c->descricao}}</td>
                <td>{{ $c->n_cod_solicitante}}</td>
                <td>{{ $c->n_cod_tecnico}}</td>
                <td>{{ $c->f_categoria}}</td>
                <td><span class="badge bg-warning text-dark">{{ $c->f_status}}</span></td>
                <td>{{ $c->d_inclusao}}</td>
            </tr>

            @endforeach
            
        </tbody>
    </table>
</div>
@endsection