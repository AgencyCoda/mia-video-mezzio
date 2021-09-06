<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MiaVideo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mia_video', function (Blueprint $table) {
            $table->id();

            $table->string('title');
    $table->string('slug');
    $table->string('author');
    $table->text('author_url');
    $table->text('caption');
    $table->text('photo');
    $table->text('video');
    $table->integer('type');
    $table->integer('creator_id');
    $table->text('summary');
    $table->integer('status');
    

            $table->foreign('creator_id')->references('id')->on('mia_user');

            $table->timestamps();

            $table->integer('deleted')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mia_video');
    }
}