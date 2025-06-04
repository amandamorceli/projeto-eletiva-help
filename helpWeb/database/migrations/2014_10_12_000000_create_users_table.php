<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login')->unique();
            $table->string('senha')->nullable();
            $table->string('nome_completo');
            $table->string('nome_resumido');
            $table->string('cpf_cnpj');
            $table->string('rg');
            $table->string('tipo_fj');
            $table->string('tipo_usuario');
            $table->integer('cep');
            $table->string('endereco');
            $table->string('numero_endereco');
            $table->string('bairo');
            $table->string('cidade');
            $table->string('estado');
            $table->dateTime('d_inicio')->default(date('Y-m-d'));
            $table->dateTime('d_fim')->nullable();    
            // $table->integer('n_cod_usuario_inc');
            // $table->dateTime('d_inclusao')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
