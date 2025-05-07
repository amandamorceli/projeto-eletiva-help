@extends('help')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">

@endsection

@section('conteudo')

<div class="form-container">

    <h3 class="text-left text-dark ms-3">📄 Novo Chamado</h3>

    <hr>

    <form method="POST" class="mt-4" style="display: flex; flex-wrap: wrap; justify-content: space-around;" action="/chamados">
        @csrf

        <div class="mb-3" style="width: 48%">

            <label for="n_cod_tecnico" class="form-label">Técnico Responsável</label>
            <select class="form-select" id="n_cod_tecnico" name="n_cod_tecnico" required>
                <option selected disabled>Selecione um técnico...</option>

                @foreach($tecnicos as $tecnico)
                    <option value="{{ $tecnico->id }}">{{ $tecnico->c_nome_resumido }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3" style="width: 48%">

            <label for="n_cod_solicitante" class="form-label">Solicitante</label>
            <select class="form-select" id="n_cod_solicitante" name="n_cod_solicitante">
                <option selected disabled>Selecione um solicitante...</option>

                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->c_nome_resumido }}</option>
                @endforeach

            </select>

        </div>

        <div class="mb-3" style="width: 48%">
            <label for="f_status" class="form-label">Status</label>
            <select class="form-select" id="f_status" name="f_status">
                <option selected disabled>Selecione um status...</option>
                
                <option value="1">Novo chamado</option>
                <option value="2">Em Atendimento</option>
                <option value="3">Em Validação</option>
                <option value="4">Finalizado</option>

            </select>
        </div>

        <div class="mb-3" style="width: 48%">

            <label for="n_categoria" class="form-label">Categoria</label>

            <select class="form-select" id="n_categoria" name="n_categoria">
                <option selected disabled>Selecione uma categoria...</option>

                @foreach($categorias as $c)

                    <option value="{{ $c->id }}">{{$c->nome}}</option>

                @endforeach

            </select>

        </div>

        <div class="mb-3" style="width: 98%">

            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>

        </div>

        <div class="mb-3" style="width: 98%">

            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>

        </div>

        <input type="hidden" name="n_cod_usuario_inc" value="1">

        <div class="botoes">

            <button type="submit" class="btn btn-envia mt-3">Cadastrar Chamado</button>
            <a href="{{ url()->previous() }}" class="btn btn_voltar mt-3">Voltar</a>

        </div>


    </form>
</div>

@endsection