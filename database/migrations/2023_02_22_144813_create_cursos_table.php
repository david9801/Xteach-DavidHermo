<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('temas');
            $table->string('archivo')->nullable();
            $table->foreignId('user_id')
                ->constrained('users');
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
        Schema::dropIfExists('cursos');
    }
}
