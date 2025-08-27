<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) {
            /*$table->foreignId('article_id')->constrained;
            $table->foreignId('tag_id')->constrained;*/
            $table->unsignedInteger('article_id');
            $table->unsignedInteger('tag_id');
            $table->timestamps();
            $table->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onDelete('cascade'); 
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_tag');
    }
}
