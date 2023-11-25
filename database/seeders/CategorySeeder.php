<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fake = Factory::create();
        $limit = 10;
        $categoryIds = DB::table('categories')->pluck('id')->toArray();
        for($i = 0; $i < $limit; $i++)
        {
            $categoryName = $fake->name();
            DB::table('categories')->insert([
                'parent_id' => $fake->randomElement(array_merge([0], $categoryIds)),
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
                'meta_title' => $fake->text(160),
                'meta_keyword' => $fake->text(32),
                'meta_description' => $fake->text(160),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
