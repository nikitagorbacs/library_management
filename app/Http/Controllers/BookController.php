<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store()
    {
        Book::create($this->requestValidation());
    }

    public function update(Book $book)
    {
        $book->update($this->requestValidation());
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
