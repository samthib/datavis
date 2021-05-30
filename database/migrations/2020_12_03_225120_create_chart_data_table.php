<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart_data', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('chart_id');
          $table->foreign('chart_id')
          ->references('id')
          ->on('charts')
          ->onDelete('cascade');
          $table->unsignedBigInteger('data_id');
          $table->foreign('data_id')
          ->references('id')
          ->on('datas')
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
        Schema::dropIfExists('chart_data');
    }
}
