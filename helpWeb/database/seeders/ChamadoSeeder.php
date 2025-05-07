<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chamado; // importa o model Chamado
use Carbon\Carbon;

class ChamadosSeeder extends Seeder // renomeie a classe para evitar conflito
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chamado::create([
            'titulo' => 'Erro ao acessar o sistema',
            'descricao' => 'Usuário não consegue fazer login.',
            'f_status' => 1, // Novo Chamado
            'n_categoria' => 'Suporte Técnico',
            'n_cod_solicitante' => 1,
            'n_cod_tecnico' => 2,
            'd_inclusao' => Carbon::now(),
        ]);

        Chamado::create([
            'titulo' => 'Problema com impressora',
            'descricao' => 'A impressora da sala 203 não imprime.',
            'f_status' => 2, // Em Atendimento
            'n_categoria' => 'Infraestrutura',
            'n_cod_solicitante' => 3,
            'n_cod_tecnico' => 2,
            'd_inclusao' => Carbon::now()->subDays(1),
        ]);

        Chamado::create([
            'titulo' => 'Solicitação de acesso',
            'descricao' => 'Novo colaborador precisa de acesso ao sistema.',
            'f_status' => 3, // Em Validação
            'n_categoria' => 'TI Interno',
            'n_cod_solicitante' => 4,
            'n_cod_tecnico' => 2,
            'd_inclusao' => Carbon::now()->subDays(2),
        ]);

        Chamado::create([
            'titulo' => 'Atualização concluída',
            'descricao' => 'Atualização de sistema finalizada com sucesso.',
            'f_status' => 4, // Finalizado
            'n_categoria' => 'Manutenção de Software',
            'n_cod_solicitante' => 5,
            'n_cod_tecnico' => 2,
            'd_inclusao' => Carbon::now()->subDays(3),
        ]);
    }
}
