<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('subheading');
            $table->string('video_url');
            $table->integer('served_number');
            $table->string('served_description');
            $table->string('image');
            $table->string('meta_title')->default('Homepage of Youth of Bengal website.');
            $table->string('meta_description')->default('Join us in making a difference! Explore our mission to create positive change and support our impactful projects.');
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
        Schema::dropIfExists('homepage');
    }
}
