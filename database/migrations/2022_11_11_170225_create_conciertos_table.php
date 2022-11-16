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
            $table->unsignedBigInteger('promotor_id');
            $table->unsignedBigInteger('recinto_id');
            $table->index('promotor_id');
            $table->index('recinto_id');
            $table->string('nombre');
            $table->integer('numero_espectadores');
            $table->date('fecha');
            $table->integer('rentabilidad')->nullable();
            $table->timestamps();

        });

       Schema::table('conciertos', function($table) {
            $table->foreign('promotor_id')->references('id')->on('promotors');
            $table->foreign('recinto_id')->references('id')->on('recintos');
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
