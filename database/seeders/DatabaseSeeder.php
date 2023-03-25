<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Author;
use App\Models\Editorial;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        $categories = Category::factory(10)->create();
        $authors = Author::factory(10)->create();
        $editorials = Editorial::factory(10)->create();

        Book::factory(20)->create()->each(function($book) use($categories){
            $book->categories()->attach($categories->random(2));
        });
        
    }
}
