<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTagsPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_tags_pivot', function (Blueprint $table) {
            $table->foreignId('article_id')->nullable()->constrained('articles')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tag_id')->nullable()->constrained('tags')
            ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('articles_tags_pivot');
    }
}
