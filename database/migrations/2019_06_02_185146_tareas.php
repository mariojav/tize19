<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tareas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulotarea');
            $table->string('desctarea');
            $table->integer('calificacion')->nullable();
            $table->timestamp('fecha_entrega');
        
            $table->integer('user_id')->unsigned();            
            $table->integer('portafolio_id')->unsigned()->nullable();            
            $table->integer('publicacion_id')->unsigned()->nullable();  // conexion con la tabla tareas 1     
            $table->integer('post_id')->unsigned();     
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('portafolio_id')
            ->references('id')
            ->on('portafolios')
            ->onDelete('cascade');

            $table->foreign('post_id')
            ->references('id')
            ->on('posts')
            ->onDelete('cascade');

            $table->foreign('publicacion_id')
            ->references('id')
            ->on('publicacions')
            ->onDelete('cascade'); // conexion con la tabla tareas 2


            // $table->foreign('archivo_tareas_id')
            // ->references('id')
            // ->on('archivo_tareas')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
}
