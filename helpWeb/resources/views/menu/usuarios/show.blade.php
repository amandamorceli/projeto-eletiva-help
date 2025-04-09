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

        <h3 class="text-left text-dark ms-3">📄 Usuário</h3>

        <hr>

        <form method="POST" class="mt-4" style="display: flex; flex-wrap: wrap; justify-content: space-around;"
            action="/usuarios/{{ $usuario->id }}">
            @csrf
            @method('DELETE')

            <div class="mb-3" style="width: 48%">

                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="c_nome_completo" value="{{ $usuario->c_nome_completo }}" disabled>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="nomeResumido" class="form-label">Nome Resumido</label>
                <input type="text" class="form-control" id="nomeResumido" name="c_nome_resumido" value="{{ $usuario->c_nome_resumido }}" disabled>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="cpfcnpj" class="form-label">CPF/CNPJ</label>
                <input type="text" class="form-control" id="cpfcnpj" name="c_cpf_cnpj" value="{{ $usuario->c_cpf_cnpj }}" disabled>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="rg" class="form-label">RG</label>
                <input type="text" class="form-control" id="rg" name="c_rg" value="{{ $usuario->c_rg }}" disabled>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="n_cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="n_cep" name="n_cep" value="{{ $usuario->n_cep }}" disabled>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="c_endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="c_endereco" name="c_endereco" value="{{ $usuario->c_endereco }}" disabled>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="c_numero_endereco" class="form-label">Numero</label>
                <input type="text" class="form-control" id="c_numero_endereco" name="c_numero_endereco" value="{{ $usuario->c_numero_endereco }}" disabled>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="c_bairo" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="c_bairo" name="c_bairo" value="{{ $usuario->c_bairo }}" disabled>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="c_cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="c_cidade" name="c_cidade" value="{{ $usuario->c_cidade }}" disabled>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="c_estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="c_estado" name="c_estado" value="{{ $usuario->c_estado }}" disabled>

            </div>

            

            <div class="mb-3" style="width: 48%">

                <label for="f_tipo_usuario" class="form-label">Tipo Pessoa</label>
                <select class="form-select" id="f_tipo_usuario" name="f_tipo_fj">
                <option selected disabled>Selecione um solicitante...</option>
                    <option {{$usuario->f_tipo_fj == "F" ? "selected" : ""}} value="F">Física</option>
                    <option {{$usuario->f_tipo_fj == "J" ? "selected" : ""}} value="J">Jurídica</option>
                </select>

            </div>

            <div class="mb-3" style="width: 48%">
                <label for="status" class="form-label">Tipo usuário</label>
                
                <select class="form-select" id="status" name="f_tipo_usuario">

                    <option selected disabled>Selecione o tipo usuario...</option>

                    <option {{$usuario->f_tipo_usuario == "T" ? "selected" : ""}} value="T">Técnico</option>
                    <option {{$usuario->f_tipo_usuario == "C" ? "selected" : ""}} value="C">Cliente</option>
                </select>
            </div>

            <input type="hidden" name="n_cod_usuario_inc" value="1">

            <button type="submit" class="btn btn-envia mt-3">Excluir usuário</button>

        </form>
    </div>
@endsection
