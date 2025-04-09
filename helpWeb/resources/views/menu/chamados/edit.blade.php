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
        background-color: #4e59dd !important;
        color: #fff !important;
        transition: all ease-in-out 0.3s !important;

        &:hover {
            background-color: #2e347b !important;
            color: #fff !important;
        }
    }
</style>

@section('conteudo')

<div class="form-container">

    <h3 class="text-left text-dark ms-3">📄 Novo Chamado</h3>

    <hr>

    <form method="POST" class="mt-4" style="display: flex; flex-wrap: wrap; justify-content: space-around;" action="/chamados/{{ $chamado->id }">
        @csrf
        @method('PUT')

        <div class="mb-3" style="width: 48%">

            <label for="tecnico" class="form-label">Técnico Responsável</label>
            <select class="form-select" id="tecnico" name="n_cod_tecnico" required>
                @foreach($tecnicos as $t)
                <option value='{{ $t->id }}' {{$chamado->n_cod_tecnico == $t->id ? "selected" : ""}}>
                    {{$t->c_nome_resumido}}
                </option>
                @endforeach
        </select>
</div>

<div class=" mb-3" style="width: 48%">

        <label for="solicitante" class="form-label">Solicitante</label>
        <select class="form-select" id="solicitante" name="n_cod_solicitante">
            @foreach($solicitantes as $s)
            <option value="{{$s->id}}" {{$chamando->n_cod_solicitante == $s->id ? "selected" : ""}}>
                {{$s->c_nome_resumido}}
            </option>
            @endforeach
        </select>

</div>

<div class="mb-3" style="width: 48%">

    <label for="status" class="form-label">Status</label>
    <select class="form-select" id="status" name="f_status">
        @foreach($statusDoChamado as $status)
        <option value="{{$status->value}}"
            @if ($chamado->f_status === $status->value) selected @endif>
            {{ $status->name }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3" style="width: 48%">

    <label for="categoria" class="form-label">Categoria</label>
    <select class="form-select" id="categoria" name="categoria">
        @foreach($categorias as $c)

        <option value="{{ $c->id }}" {{ $chamado->f_categoria == $c->id ? "selected" : "" }}>
            {{ $c->nome }}
        </option>
        @endforeach
    </select>


</div>

<div class="mb-3" style="width: 98%">

    <label for="titulo" class="form-label">Título</label>
    <input type="text" class="form-control" id="titulo" name="c_titulo" required>

</div>

<div class="mb-3" style="width: 98%">

    <label for="descricao" class="form-label">Descrição</label>
    <textarea class="form-control" id="descricao" name="c_descricao" rows="3" required>
    {{trim($chamado->c_descricao)}}
    </textarea>

</div>

<!-- <input type="hidden" name="n_cod_usuario_inc" value="">
<input type="hidden" name="d_inclusao" value=""> -->

<button type="submit" class="btn btn-envia mt-3">Cadastrar Chamado</button>

</form>
</div>

@endsection