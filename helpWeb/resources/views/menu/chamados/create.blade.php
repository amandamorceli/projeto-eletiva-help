@extends('help')

<style>

    input[type='text'],
    select,
    textarea{
        box-shadow: 0px 0.5px 10px 0px #d1d1d1;
    }

    .container{
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 0px 12px 0px #333333;
    }

    .btn-envia{
        background-color: #4e59dd !important;
        color: #fff !important;
        transition: all ease-in-out 0.3s !important;

        &:hover{
            background-color: #2e347b !important;
            color: #fff !important;
        }
    }

</style>

@section('conteudo')

    <div class="form-container">

        <h3 class="text-left text-dark ms-3">📄 Novo Chamado</h3>

        <hr>

        <form method="POST" class="mt-4" style="display: flex; flex-wrap: wrap; justify-content: space-around;" action="">
            @csrf
            
            <div class="mb-3" style="width: 48%">

                <label for="tecnico" class="form-label">Técnico Responsável</label>
                <select class="form-select" id="tecnico" name="n_cod_tecnico" required>
                    <option selected disabled>Selecione um técnico...</option>
                    <option value="1">Técnico 1</option>
                    <option value="2">Técnico 2</option>
                </select>

            </div>

            <div class="mb-3" style="width: 48%">

                <label for="solicitante" class="form-label">Solicitante</label>
                <select class="form-select" id="solicitante" name="n_cod_solicitante" >
                    <option selected disabled>Selecione um solicitante...</option>
                    <option value="1">Usuário 1</option>
                    <option value="2">Usuário 2</option>
                </select>

            </div>

            <div class="mb-3" style="width: 48%">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="f_status" >
                    <option selected disabled>Selecione um status...</option>
                    <option value="A">Aberto</option>
                    <option value="E">Em andamento</option>
                    <option value="F">Finalizado</option>
                </select>
            </div>

            <div class="mb-3" style="width: 48%">

                <label for="categoria" class="form-label">Categoria</label>

                <select class="form-select" id="categoria" name="categoria" >
                    <option selected disabled>Selecione uma categoria...</option>
                    <option value="H">Hardware</option>
                    <option value="S">Software</option>
                    <option value="A">Atendimento</option>
                </select>

            </div>

            <div class="mb-3" style="width: 98%">

                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="c_titulo" required>

            </div>

            <div class="mb-3" style="width: 98%">

                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="c_descricao" rows="3" required></textarea>

            </div>

            <input type="hidden" name="n_cod_usuario_inc" value="">
            <input type="hidden" name="d_inclusao" value="">

            <button type="submit" class="btn btn-envia mt-3">Cadastrar Chamado</button>

        </form>
    </div>
    
@endsection