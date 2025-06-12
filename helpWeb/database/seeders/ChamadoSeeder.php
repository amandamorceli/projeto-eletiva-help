<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Chamado; // importa o model Chamado
use Carbon\Carbon;

class ChamadoSeeder extends Seeder // renomeie a classe para evitar conflito
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chamado::create([
            'titulo' => 'Erro ao acessar o sistema',
            'descricao' => 'Usuário relata que, ao inserir login e senha, a tela permanece carregando e não há resposta.',
            'status' => 1, // Novo Chamado
            'categoria' => 1, // Ex: "Acesso ao sistema"
            'cod_solicitante' => 1,
            'cod_tecnico' => 2,
            'cod_usuario_inc' => 1,
            'd_inclusao' => Carbon::now()->subDays(1),
        ]);

        Chamado::create([
            'titulo' => 'Problema com impressora',
            'descricao' => 'Impressora HP LaserJet da sala 203 não está sendo reconhecida pelo sistema operacional.',
            'status' => 2, // Em Atendimento
            'categoria' => 2, // Ex: "Hardware"
            'cod_solicitante' => 3,
            'cod_tecnico' => 2,
            'cod_usuario_inc' => 1,
            'd_inclusao' => Carbon::now()->subDays(3),
        ]);

        Chamado::create([
            'titulo' => 'Solicitação de acesso ao ERP',
            'descricao' => 'O novo colaborador precisa de acesso ao módulo financeiro do sistema ERP.',
            'status' => 3, // Em Validação
            'categoria' => 1,
            'cod_solicitante' => 1,
            'cod_tecnico' => 2,
            'cod_usuario_inc' => 1,
            'd_inclusao' => Carbon::now()->subDays(5),
        ]);

        Chamado::create([
            'titulo' => 'Atualização de sistema concluída',
            'descricao' => 'A versão 3.2 do sistema foi instalada com sucesso em todos os terminais da equipe comercial.',
            'status' => 4, // Finalizado
            'categoria' => 5, // Ex: "Atualização de sistema"
            'cod_solicitante' => 2,
            'cod_tecnico' => 2,
            'cod_usuario_inc' => 1,
            'd_inclusao' => Carbon::now()->subDays(7),
        ]);
    }
}
