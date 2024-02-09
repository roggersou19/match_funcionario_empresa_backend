<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyKnowledgeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::group(['middleware' => 'api'], function () {

    Route::resource('companies', CompanyController::class)->except(['create', 'edit']);

    // Company - Knowledge
    Route::get('companies/{company}/knowledge', [CompanyKnowledgeController::class, 'index']);
    Route::post('companies/{company}/knowledge/{knowledge}', [CompanyKnowledgeController::class, 'store']);
    Route::delete('companies/{company}/knowledge/{knowledge}', [CompanyKnowledgeController::class, 'destroy']);


});