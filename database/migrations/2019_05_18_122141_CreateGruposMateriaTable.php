<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_materia', function (Blueprint $table) {        
            $table->increments('id');
            $table->string('nombregrupomat');
            $table->integer('materia_id')->unsigned();
            $table->integer('user_id')->unsigned(); 
            // $table->morphs('model');

            $table->foreign('materia_id')
                ->references('id')
                ->on('materias')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            // $table->primary(['materia_id', 'model_id', 'model_type']);
   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos_materia');
    }
}
