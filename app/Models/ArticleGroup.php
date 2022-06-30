<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleGroup extends Model
{
    use HasFactory;


    /**
     * The articles that belong to the group.
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_group_links', "article_group_id", "article_id");
    }

    public function isOwnedBy(int $userId)
    {
        return $this->user_id == $userId;
    }
}
