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
            $table->id();
            $table->unsignedBigInteger('cod_tecnico')->nullable();
            $table->foreign('cod_tecnico')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('cod_solicitante')->nullable();;
            $table->foreign('cod_solicitante')->references('id')->on('users')->onDelete('restrict');
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->integer('status')->nullable();
            $table->unsignedBigInteger('categoria')->nullable();
            $table->foreign('categoria')->references('id')->on('categorias')->onDelete('restrict');
            $table->unsignedBigInteger('cod_usuario_inc');
            $table->foreign('cod_usuario_inc')->references('id')->on('users')->onDelete('restrict');
            // $table->unsignedBigInteger('cod_usuario_alt')->nullable();
            // $table->foreign('cod_usuario_alt')->references('id')->on('users')->onDelete('restrict');
            $table->date('d_inclusao')->default(date('Y-m-d'));
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
