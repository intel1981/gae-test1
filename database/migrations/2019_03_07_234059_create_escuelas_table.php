<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscuelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuelas', function (Blueprint $table) {
            $table->bigIncrements('id'); //1
            $table->smallInteger('tipo_id'); //2
            $table->smallInteger('nivel_id'); //3
            $table->smallInteger('servicio_id'); //4
            $table->string('nombre',120); //5
            $table->string('cct',10)->unique();  //6
            $table->string('incorporacion',20)->nullable(); //7
            $table->string('turno', 60); //8
            $table->string('sostenimiento', 60); //9
            $table->string('direccion',120); //10
            $table->string('exterior',60); //11
            $table->string('interior',60)->nullable(); //12
            $table->string('referencia',120); //13
            $table->string('colonia', 120); //14
            $table->string('codpost',5); //15
            $table->string('pais',30); //16
            $table->string('estado',30); //17-entidad
            $table->string('delegacion',60); //18-municipio
            $table->string('localidad',60); //19
            $table->boolean('status')->default(false); //20
            $table->softDeletes();
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
        Schema::dropIfExists('escuelas');
    }
}
