<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conciertos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_promotor');
            $table->unsignedBigInteger('id_recinto');
            $table->index('id_promotor');
            $table->index('id_recinto');
            $table->string('nombre');
            $table->integer('numero_espectadores');
            $table->date('fecha');
            $table->integer('rentabilidad');

        });

       Schema::table('conciertos', function($table) {
            $table->foreign('id_promotor')->references('id')->on('promotors');
            $table->foreign('id_recinto')->references('id')->on('recintos');
       });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conciertos');
    }
};
