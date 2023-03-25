<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function index(){

        $books = BookCollection::collection(Book::with("categories")->get());
 
        return response()->json($books);
    }

    public function show(Book $book)
    {
        return response()->json(BookResource::make($book));
    }
}
