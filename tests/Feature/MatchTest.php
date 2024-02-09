<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MatchTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_match_endpoint(): void
    {
        $employee = Employee::find(1);
        $url = "/api/employees/$employee->id/match";
        

        $response = $this->get($url);

        $matchingSkills = $response->json();




        $matchingArray = collect();

        $result = Employee::select('companies.id')
            ->join('employee_knowledge', 'employees.id', '=', 'employee_knowledge.employee_id')
            ->join('knowledges', 'employee_knowledge.knowledge_id', '=', 'knowledges.id')
            ->join('company_knowledge', 'knowledges.id', '=', 'company_knowledge.knowledge_id')
            ->join('companies', 'company_knowledge.company_id', '=', 'companies.id')
            ->where('employees.id', $employee->id)
            ->groupBy('companies.id')
            ->havingRaw('COUNT(*) > 1')->get();

        foreach($result as $companyID){
            $company = Company::with('knowledge')->find($companyID)->first();
            $matchingArray->push($company);
        }
        

        $this->assertEquals(json_encode($matchingSkills), json_encode($matchingArray));

    }
}
