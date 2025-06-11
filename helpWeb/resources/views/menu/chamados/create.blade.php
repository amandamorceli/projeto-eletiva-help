<?php

use Illuminate\Support\Facades\Auth;
?>
@extends('help')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">

@endsection

@section('conteudo')

@php

    $isTecnico = Auth::user()->tipo_usuario === 'T';

@endphp

<div class="form-container">

    <h3 class="text-left text-dark ms-3">📄 Novo Chamado</h3>

    <hr>

    <form method="POST" class="mt-4" style="display: flex; flex-wrap: wrap; justify-content: space-around;" action="/chamados">
        @csrf

        @if($isTecnico)
        <div class="mb-3" style="width: 48%">

            <label for="cod_tecnico" class="form-label">Técnico Responsável</label>
            <select class="form-select" id="cod_tecnico" name="cod_tecnico" required>
                <option selected disabled>Selecione um técnico...</option>

                @foreach($tecnicos as $tecnico)
                    <option value="{{ $tecnico->id }}">{{ $tecnico->nome_resumido }}</option>
                @endforeach

            </select>
        
        </div>
        @endif

        <div class="mb-3" style="width: 48%">

            <label for="cod_solicitante" class="form-label">Solicitante</label>
            <select class="form-select" id="cod_solicitante" name="cod_solicitante" disabled>

                <option disabled {{ $isTecnico ? 'selected' : '' }}>Selecione um solicitante...</option>

                @foreach($usuarios as $usuario)

                    <option value="{{ $usuario->id }}" {{ !$isTecnico && $usuario->id == Auth::user()->id ? 'selected' : '' }}>
                        {{ $usuario->nome_resumido }}
                    </option>

                @endforeach

            </select>

        </div>
        

        <div class="mb-3" style="width: 48%">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" disabled>
                
                <option value="1">Novo chamado</option>

            </select>
        </div>

        @if($isTecnico)

        <div class="mb-3" style="width: 48%">

            <label for="categoria" class="form-label">Categoria</label>

            <select class="form-select" id="categoria" name="categoria">
                <option selected disabled>Selecione uma categoria...</option>

                @foreach($categorias as $c)

                    <option value="{{ $c->id }}">{{$c->nome}}</option>

                @endforeach

            </select>

        </div>
        @endif

        <div class="mb-3" style="width: 98%">

            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>

        </div>

        <div class="mb-3" style="width: 98%">

            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>

        </div>

        <input type="hidden" name="cod_usuario_inc" value="1">

        <div class="botoes">

            <button type="submit" class="btn btn-envia mt-3">Cadastrar Chamado</button>
            <a href="{{ url()->previous() }}" class="btn btn_voltar mt-3">Voltar</a>

        </div>


    </form>
</div>

@endsection