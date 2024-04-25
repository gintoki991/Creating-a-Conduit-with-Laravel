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

            // user_idカラムは外部キーとしてusersテーブルのidカラムを参照します。
            // onDelete('cascade')はユーザーが削除された時、関連する記事も自動で削除されるようにします。
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//tagテーブルが作成されて後，実行
            // $table->unsignedBigInteger('tag_id');
            // $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

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
