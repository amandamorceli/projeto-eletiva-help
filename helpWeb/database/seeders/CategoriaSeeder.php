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
        Categoria::create(['nome'=>'Categoria 1']);
        Categoria::create(['nome'=>'Categoria 2']);
        Categoria::create(['nome'=>'Categoria 3']);
        Categoria::create(['nome'=>'Categoria 4']);
        Categoria::create(['nome'=>'Categoria 5']);
    }
}
