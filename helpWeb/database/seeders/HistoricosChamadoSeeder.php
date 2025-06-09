<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HistoricosChamado;

class HistoricosChamadoSeeder extends Seeder
{
    public function run(): void
    {
        HistoricosChamado::create([
            'cod_chamado' => 1,
            'tipo' => 'mensagem',
            'status' => 2,
            'comentario' => 'Verifiquei a impressora, pode ser problema de driver.',
            'cod_usuario_inc' => 2,
            'd_inclusao' => date('Y-m-d'),
        ]);
    }
}
