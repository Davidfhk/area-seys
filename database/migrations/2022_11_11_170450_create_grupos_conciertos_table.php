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
        Schema::create('grupos_conciertos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grupo_id');
            $table->unsignedBigInteger('concierto_id');
            $table->index('grupo_id');
            $table->index('concierto_id');
            $table->timestamps();
        });

       Schema::table('grupos_conciertos', function($table) {
            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->foreign('concierto_id')->references('id')->on('conciertos');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos_conciertos');
    }
};
