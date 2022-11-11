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
        Schema::create('grupos_medios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_medio');
            $table->unsignedBigInteger('id_concierto');
            $table->index('id_medio');
            $table->index('id_concierto');
        });

       Schema::table('grupos_medios', function($table) {
            $table->foreign('id_medio')->references('id')->on('medios');
            $table->foreign('id_concierto')->references('id')->on('conciertos');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos_medios');
    }
};
