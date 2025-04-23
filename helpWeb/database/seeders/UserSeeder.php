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
            'c_login' => 'admin',
            'c_senha' => Hash::make('senha123'), // ou null se quiser deixar em branco
            'c_nome_completo' => 'Administrador do Sistema',
            'c_nome_resumido' => 'Admin',
            'c_cpf_cnpj' => '00000000000',
            'c_rg' => '0000000',
            'f_tipo_fj' => 'F', // F = Física, J = Jurídica (presumo)
            'f_tipo_usuario' => 'T', // A = Admin, T = Técnico, U = Usuário (exemplo)
            'n_cep' => 12345678,
            'c_endereco' => 'Rua Exemplo',
            'c_numero_endereco' => '100',
            'c_bairo' => 'Centro',
            'c_cidade' => 'Cidade Exemplo',
            'c_estado' => 'EX',
            'd_inicio' => Carbon::now(),
            'd_fim' => null,
            'n_cod_usuario_inc' => 1,
            'd_inclusao' => Carbon::now()
        ]);

        User::create([
            'c_login' => 'tecnico.joao',
            'c_senha' => Hash::make('senha456'),
            'c_nome_completo' => 'João da Silva',
            'c_nome_resumido' => 'João',
            'c_cpf_cnpj' => '12345678901',
            'c_rg' => '1234567',
            'f_tipo_fj' => 'F',
            'f_tipo_usuario' => 'T',
            'n_cep' => 87654321,
            'c_endereco' => 'Av. das Tecnologias',
            'c_numero_endereco' => '200',
            'c_bairo' => 'Tecnobairro',
            'c_cidade' => 'Tech City',
            'c_estado' => 'TC',
            'd_inicio' => Carbon::now(),
            'd_fim' => null,
            'n_cod_usuario_inc' => 1,
            'd_inclusao' => Carbon::now()
        ]);

        // Usuário comum
        User::create([
            'c_login' => 'usuario.maria',
            'c_senha' => Hash::make('senha789'),
            'c_nome_completo' => 'Maria Oliveira',
            'c_nome_resumido' => 'Maria',
            'c_cpf_cnpj' => '98765432100',
            'c_rg' => '7654321',
            'f_tipo_fj' => 'F',
            'f_tipo_usuario' => 'U',
            'n_cep' => 11223344,
            'c_endereco' => 'Rua dos Usuários',
            'c_numero_endereco' => '300',
            'c_bairo' => 'Bairro Novo',
            'c_cidade' => 'Cidade Nova',
            'c_estado' => 'CN',
            'd_inicio' => Carbon::now(),
            'd_fim' => null,
            'n_cod_usuario_inc' => 1,
            'd_inclusao' => Carbon::now()
        ]);
    }
}
