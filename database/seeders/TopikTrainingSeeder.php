<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TopikTraining;

class TopikTrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TopikTraining::create([
            'cover' => 'detik.jpg',
            'title' => 'Topik 1',
            'divisi_id' => 1, 
        ]);

        TopikTraining::create([
            'cover' => 'detik.jpg',
            'title' => 'Topik 2',
            'divisi_id' => 2, 
        ]);
    }
}