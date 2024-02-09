<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\KnowledgeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::group(['middleware' => 'api'], function () {

    Route::resource('knowledge', KnowledgeController::class)->except(['create', 'edit']);

});