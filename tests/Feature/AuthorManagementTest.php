<?php

namespace Tests\Feature;

use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_author_can_be_created()
    {
        $this->withoutExceptionHandling();

        $this->post('/author', [
            'first_name' => 'Nikita',
            'last_name' => 'Test',
            'dob' => '02/08/1997'
        ]);

        $authors = Author::all();

        $this->assertCount(1, $authors);
        $this->assertInstanceOf(Carbon::class, $authors->first()->dob);
        $this->assertEquals('1997/02/08', $authors->first()->dob->format('Y/m/d'));
    }
}
