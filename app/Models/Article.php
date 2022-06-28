<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get author of the article.
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Get the categories for the article.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get the groups of the article.
     */
    public function groups()
    {
        return $this->belongsToMany(ArticleGroup::class);
    }
}
