<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50); //"How to train your dragon",
            $table->string('aboutArticle', 255); //"Ever wonder how?",
            $table->string('article', 255); //"You have to believe",
            $table->string('tag', 255); //["reactjs", "angularjs", "dragons"]
            $table->string('comment', 255)->default('No comment'); // デフォルト値を設定
            ; // "His name was my name too."
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
