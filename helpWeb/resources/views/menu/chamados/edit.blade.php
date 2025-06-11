@extends('help')

<style>
    input[type='text'],
    select,
    textarea {
        box-shadow: 0px 0.5px 10px 0px #d1d1d1;
    }

    .container {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 0px 12px 0px #333333;
    }

    .btn-envia {
        background-color: #1cc916 !important;
        color: #fff !important;
        transition: all ease-in-out 0.3s !important;

        &:hover {
            background-color:rgb(19, 134, 15) !important;
            color: #fff !important;
        }
    }

    .btn_voltar{
        background-color: #4e59dd !important;
        color: #fff !important;
        transition: all ease-in-out 0.3s !important;

        &:hover {
            background-color: #2e347b !important;
            color: #fff !important;
        }
    }

    .btn-envia, .btn_voltar{
        width: 40%;
    }

    .botoes {
        display: flex;
        justify-content: space-evenly;
        width: 40%;
    }

    .botoesAcao{
        width: 100%;
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        flex-direction: row;

        & button{
            padding: 10px 15px;
            color: #fff;
            background-color: #4e59dd;
            border: none;

            margin: 0 10px;

            border-radius: 10px;

            transition: all ease-in-out 0.3s;

            &:hover{
                cursor: pointer;
                background-color: #2e347b;
            }
        }
    }

</style>

@section('conteudo')

@php

    $isTecnico = Auth::user()->tipo_usuario === 'T';

@endphp

<div class="form-container" style="width: 98%;">

    <h3 class="text-left text-dark ms-3">📄 Atualização Chamado</h3>
    <hr>

    <!-- Abas -->
    <ul class="nav nav-tabs" id="chamadoTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="form-tab" data-bs-toggle="tab" data-bs-target="#form" type="button" role="tab">Formulário</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="historico-tab" data-bs-toggle="tab" data-bs-target="#historico" type="button" role="tab">Histórico</button>
        </li>
    </ul>

    <div class="tab-content mt-3" id="chamadoTabsContent">

        <!-- Aba Formulário -->
        <div class="tab-pane fade show active" id="form" role="tabpanel">

            @if($isTecnico)
            <div class="botoesAcao">


                <form action="{{ route('chamados.update', ['id' => $chamado->id, 'novoStatus' => 3]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="botaoEnviaValidacao" type="submit"> Enviar Para Validação &nbsp; <i class="fas fa-check"></i> </button>
                </form>

                <form action="{{ route('chamados.update', ['id' => $chamado->id, 'novoStatus' => 2]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="botaoEnviaValidacao" type="submit">Iniciar Chamado &nbsp; <i class="fas fa-play"></i></button>
                </form>


            </div>
            @endif

            <form method="POST" class="mt-4" style="display: flex; flex-wrap: wrap; justify-content: space-around;" action="/chamados/{{ $chamado->id }}">
                @csrf
                @method('PUT')

                <div class="mb-3" style="width: 48%">

                    <label for="cod_tecnico" class="form-label">Técnico Responsável</label>
                    <select class="form-select" id="cod_tecnico" name="cod_tecnico" required>
                        <option selected disabled>Selecione um técnico...</option>

                        @foreach($tecnicos as $tecnico)


                            <option {{ $tecnico->id == $chamado->cod_tecnico ? "selected" : "" }}  value="{{ $tecnico->id }}">{{ $tecnico->nome_resumido }}</option>

                        @endforeach

                    </select>
                </div>

                <div class="mb-3" style="width: 48%">

                    <label for="cod_solicitante" class="form-label">Solicitante</label>
                    <select class="form-select" id="cod_solicitante" name="cod_solicitante">
                        <option selected disabled>Selecione um solicitante...</option>

                        @foreach($usuarios as $usuario)

                            <option {{ $usuario->id == $chamado->cod_solicitante ? "selected" : "" }} value="{{ $usuario->id }}">{{ $usuario->nome_resumido }}</option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3" style="width: 48%">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option disabled <?= is_null($chamado->status) ? 'selected' : '' ?>>Selecione um status...</option>
                        
                        <option value="1" <?= $chamado->status == 1 ? 'selected' : '' ?>>Novo chamado</option>
                        <option value="2" <?= $chamado->status == 2 ? 'selected' : '' ?>>Em Atendimento</option>
                        <option value="3" <?= $chamado->status == 3 ? 'selected' : '' ?>>Em Validação</option>
                        <option value="4" <?= $chamado->status == 4 ? 'selected' : '' ?>>Finalizado</option>
                        
                    </select>
                </div>

                <div class="mb-3" style="width: 48%">

                    <label for="categoria" class="form-label">Categoria</label>

                    <select class="form-select" id="categoria" name="categoria">
                        <option selected disabled>Selecione uma categoria...</option>

                        @foreach($categorias as $c)

                            <option {{ $c->id == $chamado->categoria ? "selected" : "" }} value="{{ $c->id }}">{{$c->nome}}</option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3" style="width: 98%">

                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $chamado->titulo }}" required>

                </div>

                <div class="mb-3" style="width: 98%">

                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3" required> {{ $chamado->descricao }}</textarea>

                </div>

                <input type="hidden" name="cod_usuario_inc" value="1">

                <div class="botoes">

                    <button type="submit" class="btn btn-envia mt-3">Salvar</button>
                    <a href="{{ url()->previous() }}" class="btn btn_voltar mt-3">Voltar</a>

                </div>

            </form>

        </div>

        <div class="tab-pane fade" id="historico" role="tabpanel">

            <table class="table table-bordered table-hover table-striped mt-3" style="width: 100%;">

                <thead class="table-dark">
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 20%;">Status</th>
                        <th style="width: 45%;">Comentário</th>
                        <th style="width: 20%;">Usuário</th>
                        <th style="width: 10%;">Data</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($historicos as $h)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            @switch($h->status)
                                @case(1) Novo chamado @break
                                @case(2) Em Atendimento @break
                                @case(3) Em Validação @break
                                @case(4) Finalizado @break
                                @default Não informado
                            @endswitch
                        </td>

                        <td>{{ $h->comentario }}</td>

                        <td>{{ $h->usuario->name ?? 'Usuário desconhecido' }}</td>

                        <td style="text-align: center;">{{ $h->d_inclusao }}</td>

                    </tr>
                    
                    @empty

                    <tr>
                        <td colspan="5" class="text-center">Nenhum histórico registrado para este chamado.</td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection