<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            // 'id' => '1',
            'title' => 'タイトル',
            'aboutArticle' => 'この記事について',
            'article' => '記事全文',
            'tag' => 'タグ',
            'comment' => 'コメント',
            // 'created_at' => '',
            // 'updated_at' => '',
        ];
        DB::table('articles')->insert($param);
    }
}
