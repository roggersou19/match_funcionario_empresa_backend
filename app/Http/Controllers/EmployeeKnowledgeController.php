<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeKnowledgeRequest;
use App\Models\Employee;
use App\Models\EmployeeKnowledge;
use App\Models\Knowledge;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeKnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Employee $employee): JsonResponse
    {
        return response()->json($employee->knowledge);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CompanyKnowledgeRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Employee $employee, Knowledge $knowledge): JsonResponse
    {
        $newKnowledge = $employee->knowledge()->create([
        'knowledge_id' => $knowledge->id,
        'employee_id' => $employee->id
        ]);

        $employee = $employee->knowledge()->with('knowledge')->where(['knowledge_id' => $newKnowledge->knowledge_id]);

        return response()->json($employee->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): JsonResponse
    {
        $company = EmployeeKnowledge::findOrFail($id);
        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CompanyKnowledgeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EmployeeKnowledgeRequest $request, $id): JsonResponse
    {
        $company = EmployeeKnowledge::findOrFail($id);
        $company->update($request->all());

        return response()->json($company, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Employee $employee, Knowledge $knowledge): JsonResponse
    {
        return response()->json($employee->knowledge()->where('knowledge_id', $knowledge->id)->delete());
    }

    public function match(Employee $employee): JsonResponse
    {
        return response()->json($employee->matchSkillsWithCompany());
    }
}
