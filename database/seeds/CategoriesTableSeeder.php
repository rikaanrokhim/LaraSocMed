<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Liburan'
        ]);

        Category::create([
            'name' => 'Lembur Kerja'
        ]);

        Category::create([
            'name' => 'Capek'
        ]);

        Category::create([
            'name' => 'Kesal'
        ]);

        Category::create([
            'name' => 'Bahagia'
        ]);

        Category::create([
            'name' => 'Berbunga-bunga'
        ]);

        Category::create([
            'name' => 'Fokus'
        ]);

        Category::create([
            'name' => 'Belajar'
        ]);
    }
}
