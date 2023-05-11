<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposLaboratorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_laboratorio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombregrupolab');
            $table->integer('materia_id')->unsigned();
            $table->integer('laboratorio_id')->unsigned();
            $table->string('diagrupo');
            $table->string('horagrupo'); 

            $table->foreign('materia_id')
                ->references('id')
                ->on('materias')
                ->onDelete('cascade');

            $table->foreign('laboratorio_id')
                ->references('id')
                ->on('laboratorios')
                ->onDelete('cascade');

            // $table->primary(['permission_id', 'role_id']);
   
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
        Schema::dropIfExists('grupos_laboratorio');
    }
}
