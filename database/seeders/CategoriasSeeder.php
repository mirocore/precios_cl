<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'name' => 'bolsas'
        ]);

        DB::table('categorias')->insert([
            'name' => 'detergentes y lavavajillas'
        ]);

        DB::table('categorias')->insert([
            'name' => 'limpiadores y desengrasantes'
        ]);
    }
}
