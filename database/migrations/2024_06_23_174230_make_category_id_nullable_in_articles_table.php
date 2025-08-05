<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // Remova a restrição de chave estrangeira atual
            $table->foreignId('category_id')->nullable()->change(); // Altere a coluna para aceitar valores nulos
            $table->foreign('category_id')->references('id')->on('categories'); // Adicione a restrição de chave estrangeira novamente
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // Remova a restrição de chave estrangeira atual
            $table->foreignId('category_id')->nullable()->change(); // Altere a coluna para aceitar valores nulos
            $table->foreign('category_id')->references('id')->on('categories'); // Adicione a restrição de chave estrangeira novamente
        });
    }
};
