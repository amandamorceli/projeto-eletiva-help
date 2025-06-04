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

    .campo-multiplo-titulos{
        width: 20%; 
        text-align: left;
    }
    .campo-multiplo-textos{
        width: auto; 
        text-align: left;
        padding-left: 10px;
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
                            <td class="campo-multiplo-titulos">Código:</td>
                            <td class="campo-multiplo-textos">{{ $chamado->id}}</td>
                        </tr>

                        <tr>
                            <td class="campo-multiplo-titulos">Status:</td>
                            <td class="campo-multiplo-textos">{{ $chamado->status_nome}}</td>
                        </tr>
                        <tr>
                            <td class="campo-multiplo-titulos">Categoria:</td>
                            <td class="campo-multiplo-textos">

                                @if ($chamado->categoriaDoChamado)

                                    {{ $chamado->categoriaDoChamado->nome }}

                                @else

                                    Sem categoria

                                @endif
                            
                            </td>
                        </tr>

                    </table>
                </td>

                <td>{{ $chamado->titulo}}</td>

                <td>{{ $chamado->descricao}}</td>

                <td>
                    <table width='100%'>

                        <tr>

                            <td class="campo-multiplo-titulos">Solicitante:</td>

                            <td class="campo-multiplo-textos">

                                @if ($chamado->solicitante)

                                    {{ $chamado->solicitante->nome_resumido }}

                                @else

                                    Não informado

                                @endif
                                
                            </td>

                        </tr>

                        <tr>
                            <td class="campo-multiplo-titulos">Técnico:</td>

                            <td class="campo-multiplo-textos">

                                @if ($chamado->tecnico)

                                    {{ $chamado->tecnico->nome_resumido }}

                                @else

                                    Não informado
                                    
                                @endif

                            </td>
                            
                        </tr>

                    </table>
                </td>
                <td style="text-align: center;">{{ date('d/m/Y', strtotime($chamado->d_inclusao)) }}</td>
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