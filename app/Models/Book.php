<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Book extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Category::class,'books_categories');
    }

    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function editorials()
    {
        return $this->hasMany(Editorial::class);
    }

}
