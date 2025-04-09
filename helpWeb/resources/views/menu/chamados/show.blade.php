@extends('help')

@section('conteudo')
<div class="container">
    <h1>Detalhes do Chamado</h1>
    <div class="card">
        <div class="card-header">
            <h5>Chamado #{{ $chamado->id }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Título:</strong> {{ $chamado->titulo }}</p>
            <p><strong>Descrição:</strong> {{ $chamado->descricao }}</p>
            <p><strong>Status:</strong> {{ $chamado->status }}</p>
            <p><strong>Criado em:</strong> {{ $chamado->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Atualizado em:</strong> {{ $chamado->updated_at->format('d/m/Y H:i') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('chamados.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection