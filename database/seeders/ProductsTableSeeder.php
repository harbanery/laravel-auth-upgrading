<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Product 1',
            'price' => 100,
            'stock' => 50,
        ]);

        DB::table('products')->insert([
            'name' => 'Product 2',
            'price' => 150,
            'stock' => 30,
        ]);
    }
}
