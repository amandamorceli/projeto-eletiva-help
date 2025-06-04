<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'login' => 'admin',
            'senha' => Hash::make('senha123'), // ou null se quiser deixar em branco
            'nome_completo' => 'Administrador do Sistema',
            'nome_resumido' => 'Admin',
            'cpf_cnpj' => '00000000000',
            'rg' => '0000000',
            'tipo_fj' => 'F', // F = Física, J = Jurídica (presumo)
            'tipo_usuario' => 'T', // T = Técnico, U = Usuário (exemplo)
            'cep' => 12345678,
            'endereco' => 'Rua Exemplo',
            'numero_endereco' => '100',
            'bairo' => 'Centro',
            'cidade' => 'Cidade Exemplo',
            'estado' => 'EX',
            'd_inicio' => Carbon::now(),
            'd_fim' => null,
            // 'cod_usuario_inc' => 1,
            // 'd_inclusao' => Carbon::now()
        ]);

        User::create([
            'login' => 'tecnico.joao',
            'senha' => Hash::make('senha456'),
            'nome_completo' => 'João da Silva',
            'nome_resumido' => 'João',
            'cpf_cnpj' => '12345678901',
            'rg' => '1234567',
            'tipo_fj' => 'F',
            'tipo_usuario' => 'T',
            'cep' => 87654321,
            'endereco' => 'Av. das Tecnologias',
            'numero_endereco' => '200',
            'bairo' => 'Tecnobairro',
            'cidade' => 'Tech City',
            'estado' => 'TC',
            'd_inicio' => Carbon::now(),
            'd_fim' => null,
            // 'cod_usuario_inc' => 1,
            // 'd_inclusao' => Carbon::now()
        ]);

        // Usuário comum
        User::create([
            'login' => 'usuario.maria',
            'senha' => Hash::make('senha789'),
            'nome_completo' => 'Maria Oliveira',
            'nome_resumido' => 'Maria',
            'cpf_cnpj' => '98765432100',
            'rg' => '7654321',
            'tipo_fj' => 'F',
            'tipo_usuario' => 'U',
            'cep' => 11223344,
            'endereco' => 'Rua dos Usuários',
            'numero_endereco' => '300',
            'bairo' => 'Bairro Novo',
            'cidade' => 'Cidade Nova',
            'estado' => 'CN',
            'd_inicio' => Carbon::now(),
            'd_fim' => null,
            // 'cod_usuario_inc' => 1,
            // 'd_inclusao' => Carbon::now()
        ]);
    }
}
