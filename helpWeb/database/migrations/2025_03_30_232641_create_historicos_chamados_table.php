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
        Schema::create('historicos_chamados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cod_chamado')->nullable();
            $table->foreign('cod_chamado')->references('id')->on('chamados')->onDelete('restrict');
            $table->integer('status')->default(1);
            $table->text('comentario');
            $table->unsignedBigInteger('cod_usuario_inc');
            $table->foreign('cod_usuario_inc')->references('id')->on('users')->onDelete('restrict');
            $table->date('d_inclusao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historicos_chamados');
    }
};
