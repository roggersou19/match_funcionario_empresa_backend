<?php

namespace App\Http\Controllers;

use App\Http\Requests\KnowledgeRequest;
use Illuminate\Http\Request;
use App\Models\Knowledge;
use Illuminate\Http\JsonResponse;

class KnowledgeController extends Controller
{
    public function index(): JsonResponse
    {
        $knowledges = Knowledge::all();
        return response()->json($knowledges);
    }

    public function store(KnowledgeRequest $request): JsonResponse
    {
        $knowledge = Knowledge::create($request->all());
        return response()->json($knowledge, 201);
    }

    public function show($id): JsonResponse
    {
        $knowledge = Knowledge::findOrFail($id);
        return response()->json($knowledge);
    }

    public function update(KnowledgeRequest $request, $id): JsonResponse
    {
        $knowledge = Knowledge::findOrFail($id);
        $knowledge->update($request->all());
        
        return response()->json($knowledge, 200);
    }

    public function destroy($id): JsonResponse
    {
        $knowledge = Knowledge::findOrFail($id);
        $knowledge->delete();
        return response()->json(null, 204);
    }
}
