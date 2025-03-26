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
            $table->id('n_cod_usuario');
            $table->string('c_login')->unique();
            $table->string('c_senha');
            $table->string('c_nome_completo');
            $table->string('c_nome_resumido');
            $table->string('c_cpf_cnpj');
            $table->string('c_rg');
            $table->string('f_tipo_fj');
            $table->intval('n_cep');
            $table->string('c_endereco');
            $table->string('c_numero_endereco');
            $table->string('c_bairo');
            $table->string('c_cidade');
            $table->string('c_estado');
            $table->timestamps('d_inicio');
            $table->timestamps('d_fim');
            $table->intval('n_cod_usuario_inc');
            $table->timestamps('d_inclusao');
            $table->rememberToken();
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
