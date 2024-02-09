<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeKnowledgeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::group(['middleware' => 'api'], function () {

    Route::resource('employees', EmployeeController::class)->except(['create', 'edit']);

    // Employee - Knowledge
    Route::get('employees/{employee}/knowledge', [EmployeeKnowledgeController::class, 'index']);
    Route::post('employees/{employee}/knowledge/{knowledge}', [EmployeeKnowledgeController::class, 'store']);
    Route::delete('employees/{employee}/knowledge/{knowledge}', [EmployeeKnowledgeController::class, 'destroy']);
    Route::get('employees/{employee}/match/', [EmployeeKnowledgeController::class, 'match']);

});