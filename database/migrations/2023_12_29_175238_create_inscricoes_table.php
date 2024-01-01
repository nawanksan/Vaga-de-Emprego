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
        Schema::create('inscricoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_vaga')->nullable(false);
            $table->unsignedBigInteger('id_candidato')->nullable(false);
            $table->boolean('aprovado')->default(false);
            $table->foreign('id_vaga')->references('id')->on('vagas');
            $table->foreign('id_candidato')->references('id')->on('candidatos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscricoes');
    }
};
