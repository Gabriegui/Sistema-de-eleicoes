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
        Schema::create('candidaturas', function (Blueprint $table) {
            $table->id();
            $table->integer('candidato_id');
            $table->foreign('candidato_id')->references('id')->on('candidatos')->onDelete('cascade');
            $table->integer('partido_id');
            $table->foreign('partido_id')->references('id')->on('partidos')->onDelete('cascade');
            $table->string('Nome_urna');
            $table->integer('Numero_urna');
            $table->integer('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
            $table->integer('status_id');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidaturas');
    }
};
