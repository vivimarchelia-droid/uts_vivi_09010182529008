<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    public function run(): void
    {
        $novel = Category::create([
            'name' => 'Novel',
            'description' => 'Buku cerita dan karya fiksi.',
        ]);

        $pendidikan = Category::create([
            'name' => 'Pendidikan',
            'description' => 'Buku yang berkaitan dengan pendidikan.',
        ]);

        $teknologi = Category::create([
            'name' => 'Teknologi',
            'description' => 'Buku mengenai teknologi dan komputer.',
        ]);

        Book::create([
            'category_id' => $novel->id,
            'title' => 'Laskar Pelangi',
            'author' => 'Andrea Hirata',
            'publisher' => 'Bentang Pustaka',
            'year' => 2005,
            'stock' => 10,
        ]);

        Book::create([
            'category_id' => $novel->id,
            'title' => 'Bumi',
            'author' => 'Tere Liye',
            'publisher' => 'Gramedia',
            'year' => 2014,
            'stock' => 8,
        ]);

        Book::create([
            'category_id' => $pendidikan->id,
            'title' => 'Pengantar Ilmu Pendidikan',
            'author' => 'Hasbullah',
            'publisher' => 'Rajawali Pers',
            'year' => 2020,
            'stock' => 7,
        ]);

        Book::create([
            'category_id' => $teknologi->id,
            'title' => 'Pemrograman Web',
            'author' => 'Budi Raharjo',
            'publisher' => 'Informatika',
            'year' => 2022,
            'stock' => 12,
        ]);

        Book::create([
            'category_id' => $teknologi->id,
            'title' => 'Belajar Laravel',
            'author' => 'Andi Setiawan',
            'publisher' => 'Elex Media Komputindo',
            'year' => 2024,
            'stock' => 15,
        ]);
    }
}