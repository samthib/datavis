<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chart_id');
            $table->foreign('chart_id')
                ->references('id')
                ->on('charts')
                ->onDelete('cascade');
            $table->unsignedBigInteger('media_id');
            $table->foreign('media_id')
                ->references('id')
                ->on('medias')
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
        Schema::dropIfExists('chart_media');
    }
}
