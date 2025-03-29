<style>

    .container{
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 0px 12px 0px #333333;
    }

</style>

<div class="container m-4 w-100 p-5" style="max-width: 100% !important">
    <h3 class="mb-4">Lista de Chamados</h3>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Solicitante</th>
                    <th>Técnico</th>
                    <th>Categoria</th>
                    <th>Status</th>
                    <th>Data de Inclusão</th>
                    <th>Horas Executadas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Erro no sistema</td>
                    <td>Usuário relatou erro ao acessar o painel.</td>
                    <td>João Silva</td>
                    <td>Maria Souza</td>
                    <td>Suporte Técnico</td>
                    <td><span class="badge bg-warning text-dark">Pendente</span></td>
                    <td>28/03/2024</td>
                    <td>2h</td>
                </tr>
                <tr>
                    <td>Problema na impressora</td>
                    <td>Impressora não imprime documentos.</td>
                    <td>Marcos Lima</td>
                    <td>Carlos Santos</td>
                    <td>Hardware</td>
                    <td><span class="badge bg-success">Resolvido</span></td>
                    <td>27/03/2024</td>
                    <td>3h30m</td>
                </tr>
                <tr>
                    <td>Requisição de acesso</td>
                    <td>Solicitação de acesso ao sistema de vendas.</td>
                    <td>Ana Pereira</td>
                    <td>Pedro Almeida</td>
                    <td>Administração</td>
                    <td><span class="badge bg-danger">Aguardando Aprovação</span></td>
                    <td>26/03/2024</td>
                    <td>1h</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
