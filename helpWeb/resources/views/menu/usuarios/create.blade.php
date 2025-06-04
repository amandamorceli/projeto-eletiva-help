@extends('help')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">

@endsection

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

        <h3 class="text-left text-dark ms-3">📄 Novo Usuário</h3>

        <hr>

        <form method="POST" class="mt-4" style="display: flex; flex-wrap: wrap; justify-content: space-around;"
            action="/usuarios">
            @csrf

            <div class="mb-3" style="width: 48%">

                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="sobrenome" class="form-label">Sobrenome</label>
                <input type="text" class="form-control" id="sobrenome" name="sobrenome" required>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="cpfcnpj" class="form-label">CPF/CNPJ</label>
                <input type="text" class="form-control" id="cpfcnpj" name="cpf_cnpj" required>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="rg" class="form-label">RG</label>
                <input type="text" class="form-control" id="rg" name="rg" required>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" required>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="numero_endereco" class="form-label">Numero</label>
                <input type="text" class="form-control" id="numero_endereco" name="numero_endereco" required>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required readonly>

            </div>
            
            <div class="mb-3" style="width: 48%">

                <label for="bairo" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="bairo" name="bairo" required readonly>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" required readonly>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" required readonly>

            </div>

            

            <div class="mb-3" style="width: 48%">

                <label for="tipo_fj" class="form-label">Tipo Pessoa</label>
                <select class="form-select" id="tipo_fj" name="tipo_fj">
                    <option selected disabled>Selecione um solicitante...</option>
                    <option value="F">Física</option>
                    <option value="J">Jurídica</option>
                </select>

            </div>

            <div class="mb-3" style="width: 48%">
                <label for="tipo_usuario" class="form-label">Tipo usuário</label>
                
                <select class="form-select" id="tipo_usuario" name="tipo_usuario">

                    <option selected disabled>Selecione o tipo usuario...</option>

                    <option value="T">Técnico</option>
                    <option value="C">Cliente</option>
                </select>
            </div>

            <input type="hidden" name="cod_usuario_inc" value="1">

            <div class="botoes">

                <button type="submit" class="btn btn-envia mt-3">Cadastrar Usuário</button>

                <a href="{{ url()->previous() }}" class="btn btvoltar mt-3">Voltar</a>

            </div>

        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js" integrity="sha512-F5Ul1uuyFlGnIT1dk2c4kB4DBdi5wnBJjVhL7gQlGh46Xn0VhvD8kgxLtjdZ5YN83gybk/aASUAlpdoWUjRR3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/funcoes.js') }}"></script>

@endsection
