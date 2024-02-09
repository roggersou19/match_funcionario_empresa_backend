<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyKnowledge;
use App\Models\Knowledge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyKnowledgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = Company::all();
        $knowledge = Knowledge::all();

        foreach ($companies as $company) {
            $randomKnowledgeIds = $knowledge->pluck('id')->shuffle()->take(3);

            foreach ($randomKnowledgeIds as $knowledgeId) {
                $pivot = CompanyKnowledge::create([
                    'company_id' => $company->id,
                    'knowledge_id' => $knowledgeId,
                ]);
            }
        }
    }
}
