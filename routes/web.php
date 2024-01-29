<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\QuestionnaireController;

Route::get('/', function () {
    return view('questionnaire.index');
});

Route::get('/', [QuestionnaireController::class, 'index']);
Route::post('/questionnaire', [QuestionnaireController::class, 'store'])->name('questionnaire.store');
