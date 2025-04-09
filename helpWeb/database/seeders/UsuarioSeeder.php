<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create(['c_login' => 'usuario1']);
        User::create(['c_senha' => '1234']);
        User::create(['c_nome_completo' => 'Usuario mestre']);
        User::create(['c_nome_resumido' => 'Mestre']);
        User::create(['c_cpf_cnpj' => '99999999999']);
        User::create(['c_rg' => '999999999']);
        User::create(['f_tipo_fj' => 'F']);
        User::create(['f_tipo_usuario' => 'T']);
        User::create(['n_cep' => '19065040']);
        User::create(['c_endereco' => 'testeEnd']);
        User::create(['c_numero_endereco' => 'testNume']);
        User::create(['c_bairo' => 'testeBairro']);
        User::create(['c_cidade' => 'testeCidade']);
        User::create(['c_estado' => 'testeEstado']);
        User::create(['d_inicio' => date('Y-m-d')]);
        User::create(['d_fim' => '']);
        User::create(['n_cod_usuario_inc' => '0']);
        User::create(['d_inclusao' => date('Y-m-d')]);
    }
}
