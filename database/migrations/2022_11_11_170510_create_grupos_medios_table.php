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
            $table->unsignedBigInteger('medio_id');
            $table->unsignedBigInteger('concierto_id');
            $table->index('medio_id');
            $table->index('concierto_id');
            $table->timestamps();
        });

       Schema::table('grupos_medios', function($table) {
            $table->foreign('medio_id')->references('id')->on('medios');
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
        Schema::dropIfExists('grupos_medios');
    }
};
