<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'aboutArticle',
        'article',
        'user_id' // 忘れず設定すること
    ];

    // userとのリレーション設定
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // tagとのリレーション設定（中間テーブル使用）
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }

    // commentsとのリレーション設定
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
