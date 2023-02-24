<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')
                ->constrained('cursos')
                ->onDelete('cascade');
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->float('nota_media');
            $table->integer('progreso_medio');
            $table->boolean('superado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * }    *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
}
