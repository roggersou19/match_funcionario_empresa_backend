<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyKnowledgeRequest;
use App\Models\Company;
use App\Models\CompanyKnowledge;
use App\Models\Knowledge;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyKnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Company $company): JsonResponse
    {
        return response()->json($company->knowledge);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CompanyKnowledgeRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Company $company, Knowledge $knowledge): JsonResponse
    {
        return response()->json($company->knowledge()->create([
            'knowledge_id' => $knowledge->id,
            'company_id' => $company->id
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): JsonResponse
    {
        $company = CompanyKnowledge::findOrFail($id);
        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CompanyKnowledgeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CompanyKnowledgeRequest $request, $id): JsonResponse
    {
        $company = CompanyKnowledge::findOrFail($id);
        $company->update($request->all());

        return response()->json($company, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Company $company, Knowledge $knowledge): JsonResponse
    {
        return response()->json($company->knowledge()->where('knowledge_id', $knowledge->id)->delete());
    }
}
