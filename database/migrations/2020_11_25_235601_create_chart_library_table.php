<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartLibraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart_library', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('chart_id');
          $table->foreign('chart_id')
          ->references('id')
          ->on('charts')
          ->onDelete('cascade');
          $table->unsignedBigInteger('library_id');
          $table->foreign('library_id')
          ->references('id')
          ->on('libraries')
          ->onDelete('cascade');
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
        Schema::dropIfExists('chart_library');
    }
}
