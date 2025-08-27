<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsUserstampsTagsTableCategoriesTableArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')
                ->nullable();
            $table->foreign('created_by')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('updated_by')
                ->nullable();
            $table->foreign('updated_by')
                ->references('id')
                ->on('users');                
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')
                ->nullable();
            $table->foreign('created_by')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('updated_by')
                ->nullable();
            $table->foreign('updated_by')
                ->references('id')
                ->on('users');                
        });
        Schema::table('tags', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')
                ->nullable();
            $table->foreign('created_by')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('updated_by')
                ->nullable();
            $table->foreign('updated_by')
                ->references('id')
                ->on('users');                
        });       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
        });
        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
        });                
    }
}
