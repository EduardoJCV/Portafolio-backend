<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'category_id'
    ];



    public function categories(){
        return $this->hasMany(Category::class);
    }
}
