<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_book_can_be_added_to_library()
    {
        $this->withoutExceptionHandling();

        $this->post('/book', [
            'title' => 'Harry Potter',
            'author' => 'Nikita'
        ]);

        $this->assertCount(1, Book::all());
    }

    public function test_author_is_required()
    {

        $response = $this->post('/book', [
            'title' => 'Harry Potter',
            'author' => ''
        ]);

        $response->assertSessionHasErrors('author');
    }

    public function test_book_update()
    {
        $this->withoutExceptionHandling();

        $this->post('/book', [
            'title' => 'Harry Potter',
            'author' => 'Nikita'
        ]);

        $book = Book::first();


        $response = $this->put('/books/' . $book->id, [
            'title' => 'Harry not Potter',
            'author' => 'not Nikita'
        ]);

        $this->assertEquals('Harry not Potter', Book::first()->title);
        $this->assertEquals('not Nikita', Book::first()->author);
    }

    public function test_a_book_was_deleted()
    {
        $this->post('/book', [
            'title' => 'Harry Potter',
            'author' => 'Nikita'
        ]);

        $book = Book::first();

        $response = $this->delete('books/' . $book->id);

        $this->assertCount(0, Book::all());
        $response->assertRedirect('books');
    }
}
