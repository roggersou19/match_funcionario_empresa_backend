<?php

namespace Database\Seeders;

use App\Models\EmployeeKnowledge;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UsersTableSeeder::class,
            CompaniesTableSeeder::class,
            EmployeesTableSeeder::class,
            KnowledgesTableSeeder::class,

            // Pivots
            #EmployeeKnowledgeTableSeeder::class,
            CompanyKnowledgeTableSeeder::class,
        ]);
        
    }
}
