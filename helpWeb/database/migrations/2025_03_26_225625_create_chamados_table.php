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
        Schema::create('chamados', function (Blueprint $table) {
            $table->id('n_cod_chamado');
            $table->unsignedBigInteger('n_cod_tecnico')->nullable();
            $table->foreign('n_cod_tecnico')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('n_cod_solicitante');
            $table->foreign('n_cod_solicitante')->references('id')->on('users')->onDelete('restrict');
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->string('f_status')->default();
            $table->string('f_categoria')->nullable();
            $table->unsignedBigInteger('n_cod_usuario_inc');
            $table->foreign('n_cod_usuario_inc')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('n_cod_usuario_alt');
            $table->foreign('n_cod_usuario_alt')->references('id')->on('users')->onDelete('restrict');
            $table->timestamps('d_inclusao');
            $table->timestamps('d_alteracao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamados');
    }
};
