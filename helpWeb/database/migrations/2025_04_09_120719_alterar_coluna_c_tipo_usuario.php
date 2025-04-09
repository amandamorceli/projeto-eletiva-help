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
        Schema::table('users', function (Blueprint $table) {
            // Primeiro precisa dropar a coluna antiga
            $table->dropColumn('c_tipo_usuario');
        });

        Schema::table('users', function (Blueprint $table) {
            // Depois recria como boolean
            $table->boolean('b_tipo_usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('b_tipo_usuario');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('c_tipo_usuario');
        });
    }
};
