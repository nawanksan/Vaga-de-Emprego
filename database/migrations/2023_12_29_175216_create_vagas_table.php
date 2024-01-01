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
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_empresa')->nullable(false);
            $table->string('titulo')->nullable(false);
            $table->string('descricao')->nullable(false);
            $table->string('requisitos')->nullable(true);
            $table->string('salario')->nullable(true);
            $table->integer('total_candidatos')->nullable(false);
            $table->foreign('id_empresa')->references('id')->on('empresas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vagas');
    }
};
