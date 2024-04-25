<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    use HasFactory;

    public function ArticlesTags()
    {
        return $this->belongsToMany(Article::class, 'article_tags_table', 'article_id', 'tag_id');
    }

}
