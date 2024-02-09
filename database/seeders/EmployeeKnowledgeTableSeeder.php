<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\EmployeeKnowledge;
use App\Models\Knowledge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeKnowledgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $employees = Employee::all();
        $knowledge = Knowledge::all();

        foreach ($employees as $employee) {

            $pivot = EmployeeKnowledge::create([
                'employee_id' => $employees->random()->id,
                'knowledge_id' => $knowledge->random()->id,
            ]);
        }
    }
}
