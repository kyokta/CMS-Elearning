<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisi = [
            ['name' => 'Marketing'],
            ['name' => 'IT'],
            ['name' => 'Human Capital'],
            ['name' => 'Product'],
            ['name' => 'Redaksi'],
        ];

        DB::table('divisis')->insert($divisi);
    }
}