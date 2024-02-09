<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    public function index(): JsonResponse
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function store(EmployeeRequest $request): JsonResponse
    {
        $employee = Employee::create($request->all());
        return response()->json($employee, 201);
    }

    public function show($id): JsonResponse
    {
        $employee = Employee::findOrFail($id);
        return response()->json($employee);
    }

    public function update(EmployeeRequest $request, $id): JsonResponse
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        
        return response()->json($employee, 200);
    }

    public function destroy($id): JsonResponse
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json(null, 204);
    }
}
