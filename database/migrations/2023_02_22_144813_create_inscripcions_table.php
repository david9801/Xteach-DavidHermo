<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionsTable extends Migration
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
                ->constrained('cursos');
            $table->foreignId('user_id')
                ->constrained('users');
            $table->float('nota_media');
            $table->integer('progreso_medio');
            $table->boolean('superado')->default(false);
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
        Schema::dropIfExists('inscripcions');
    }
}
