<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'topik_id' => '1',
            'cover' => 'detik.jpg',
            'title' => 'Materi 1',
            'description' => 'Ini adalah materi 1 dimana materinya masih berbentuk dummy',
            'mentor' => 'H.Adi',
            'student' => '5',
        ]);
        
        Course::create([
            'topik_id' => '1',
            'cover' => 'detik.jpg',
            'title' => 'Materi 2',
            'description' => 'Ini adalah contoh materi yang kedua',
            'mentor' => 'Arjo',
            'student' => '3',
        ]);
    }
}