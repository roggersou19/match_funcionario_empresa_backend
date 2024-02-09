<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'name',
        'email',
        'document',
        'telephone',
    ];


    public function scopeMatchSkillsWithCompany($query)
    {

        $array = collect();

        $result = $query
            ->select('companies.id')
            ->join('employee_knowledge', 'employees.id', '=', 'employee_knowledge.employee_id')
            ->join('knowledges', 'employee_knowledge.knowledge_id', '=', 'knowledges.id')
            ->join('company_knowledge', 'knowledges.id', '=', 'company_knowledge.knowledge_id')
            ->join('companies', 'company_knowledge.company_id', '=', 'companies.id')
            ->where('employees.id', $this->id)
            ->groupBy('companies.id')
            ->havingRaw('COUNT(*) > 1')->get();

        foreach($result as $companyID){
            $company = Company::with('knowledge')->find($companyID)->first();
            $array->push($company);
        }
        
        return $array;
    }

    public function knowledge()
    {
        return $this->hasMany(EmployeeKnowledge::class, 'employee_id', 'id')->with('knowledge');
    }

}
