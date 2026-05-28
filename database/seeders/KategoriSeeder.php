<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kategoris')->insert([
            'name' => 'Technologi',
            'description' => 'Kategori berita tentang teknologi terbaru dan inovasi di dunia teknologi.'
        ]);
    }
}
