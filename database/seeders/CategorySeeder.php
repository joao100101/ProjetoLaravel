<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Category $category)
    {
        //
        $category->create([
            'title'=>'Categoria A'
        ]);
        $category->create([
            'title'=>'Categoria B'
        ]);
        $category->create([
            'title'=>'Categoria C'
        ]);
        $category->create([
            'title'=>'Categoria D'
        ]);
        $category->create([
            'title'=>'Categoria E'
        ]);
        $category->create([
            'title'=>'Categoria F'
        ]);
        $category->create([
            'title'=>'Categoria G'
        ]);
        $category->create([
            'title'=>'Categoria H'
        ]);

    }
}
