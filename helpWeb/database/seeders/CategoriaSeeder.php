<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Categoria::create(['nome' => 'Hardware']);
        Categoria::create(['nome' => 'Software']);
        Categoria::create(['nome' => 'Impressoras']);
        Categoria::create(['nome' => 'Atendimento']);
        Categoria::create(['nome' => 'Rede']);
    }
}
