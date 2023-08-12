<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategoriesMetadata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table){
            $table->string('meta_title')->nullable()->default('Category Default Meta Title for SEO')->change();
            $table->string('meta_description')->nullable()->default('Category Default Meta Description for SEO')->change();
            $table->string('meta_keyword')->nullable()->default('Category Default Meta Keywords for SEO')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
