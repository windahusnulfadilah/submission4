<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y/m/d H:i:s');
        $booksData = [
            [
                'book_name' => 'PHP Programming',
                'author' => 'Alex Tarnar',
                'published_at' => $date
            ],
            [
                'book_name' => 'Math Essentials',
                'author' => 'Tom Krone',
                'published_at' => $date
            ],
            [
                'book_name' => 'German Base',
                'author' => 'Matheus',
                'published_at' => $date
            ],
            [
                'book_name' => 'English Pro',
                'author' => 'Harry',
                'published_at' => $date
            ],
        ];

        foreach($booksData as $value){
            Books::create($value);
        }

    }
}
