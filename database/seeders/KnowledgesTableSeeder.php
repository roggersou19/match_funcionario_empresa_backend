<?php

namespace Database\Seeders;

use App\Models\Knowledge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KnowledgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Factory
        //Knowledge::factory()->count(10)->create();

        $skills = [
            'React',
            'Vue.js',
            'Angular',
            'Laravel',
            'NodeJS',
            'Ruby on Rails',
            'Git',
            'DevOps',
            'MySQL',
            'PostgreSQL'
        ];
        
        foreach($skills as $skill){
            Knowledge::create(['name' => $skill]);
        }
    }
}
