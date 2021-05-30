<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs', function (Blueprint $table) {
          $table->id();
          $table->boolean('active');
          $table->string('link')->nullable();
          $table->string('title')->nullable();
          $table->string('subtitle')->nullable();
          $table->text('description')->nullable();
          $table->string('hero');
          $table->string('logo');
          $table->string('color');
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
        Schema::dropIfExists('designs');
    }
}
