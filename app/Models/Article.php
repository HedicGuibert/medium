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

    protected $fillable = [
        'title',
        'introduction',
        'body',
        'image',
        'slug',
        'like',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the categories for the article.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, "article_categories", "article_id", "category_id");
    }

    /**
     * Get the groups of the article.
     */
    public function groups()
    {
        return $this->belongsToMany(ArticleGroup::class, 'article_group_links', 'article_id');
    }

    public function isFavourite()
    {
        return FavouriteArticles::where('user_id', auth()->id())
            ->where('article_id', $this->id)
            ->exists();
    }
}
