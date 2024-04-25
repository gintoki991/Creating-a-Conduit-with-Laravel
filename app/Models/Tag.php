<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag',
    ];

    //articleとのリレーション設定（中間テーブル使用）
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
