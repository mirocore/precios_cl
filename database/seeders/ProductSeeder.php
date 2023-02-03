<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Bolsas negras de basura',
            'amount' => 50,
            'price' => 500,
            'state' => 0,
            'id_categoria' => 1
        ]);
        DB::table('products')->insert([
            'name' => 'Bolsas rojas de basura',
            'amount' => 10,
            'price' => 200,
            'state' => 1,
            'id_categoria' => 1
        ]);
        DB::table('products')->insert([
            'name' => 'Bolsas verdes de basura',
            'amount' => 20,
            'price' => 300,
            'state' => 1,
            'id_categoria' => 1
        ]);
    }
}
