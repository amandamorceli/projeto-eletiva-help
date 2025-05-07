@extends('help')

<style>
    .container {
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
<h3 class="mb-4">Lista de Chamados</h3>

<div class="table-responsive" style="width: 90%;">

    <table class="table table-bordered table-hover table-striped" style="width: 100%;">

        <thead class="table-dark">
            <tr>
                <th style="width: 5%">&nbsp</th>
                <th style="width: 20%">&nbsp</th>
                <th style="width: 15%">Título</th>
                <th style="width: 25%">Descrição</th>
                <th style="width: 20%">Pessoas</th>
                <th style="width: 12%">Data de Inclusão</th>
            </tr>
        </thead>
        <tbody>

            @foreach($chamados as $chamado)
            
            <tr>
                <td>

                    <span class="icones">

                        <a href="/chamados/{{ $chamado->id }}"><i class="fa-solid fa-eye"></i></a>

                        <a href="/chamados/{{ $chamado->id }}/edit"><i class='fas fa-edit'></i></a>

                    </span>


                </td>

                <td>
                    <table width='100%'>

                        <tr>
                            <td>Código:</td>
                            <td>{{ $chamado->id}}</td>
                        </tr>

                        <tr>
                            <td>Status:</td>
                            <td>{{ $chamado->status_nome}}</td>
                        </tr>
                        <tr>
                            <td>Categoria:</td>
                            <td>{{ $chamado->categoriaDoChamado->nome}}</td>
                        </tr>

                    </table>
                </td>

                <td>{{ $chamado->titulo}}</td>
                <td>{{ $chamado->descricao}}</td>
                <td>
                    <table width='100%'>

                        <tr>
                            <td>Solicitante:</td>
                            <td>{{ $chamado->solicitante->c_nome_completo}}</td>
                        </tr>

                        <tr>
                            <td>Técnico:</td>
                            <td>{{ $chamado->tecnico->c_nome_completo}}</td>
                        </tr>

                    </table>
                </td>
                <td>{{ date('d/m/Y', strtotime($chamado->d_inclusao)) }}</td>
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