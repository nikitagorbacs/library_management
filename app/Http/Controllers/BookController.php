<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return $books;
    }

    public function store()
    {
        $book = Book::create($this->requestValidation());

        return redirect($book->path());
    }

    public function update(Book $book)
    {
        $book->update($this->requestValidation());

        return redirect($book->path());
    }

    public function delete(Book $book)
    {
        $book->delete();

        return redirect('books');
    }

    public function requestValidation()
    {
        $data = request()->validate([
            'title' => '',
            'author' => 'required'
        ]);
        return $data;
    }
}
