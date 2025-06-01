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
            $table->string('c_login')->unique();
            $table->string('c_senha')->nullable();
            $table->string('c_nome_completo');
            $table->string('c_nome_resumido');
            $table->string('c_cpf_cnpj');
            $table->string('c_rg');
            $table->string('f_tipo_fj');
            $table->string('f_tipo_usuario');
            $table->integer('n_cep');
            $table->string('c_endereco');
            $table->string('c_numero_endereco');
            $table->string('c_bairo');
            $table->string('c_cidade');
            $table->string('c_estado');
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
