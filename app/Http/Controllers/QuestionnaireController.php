<?php
// app/Http/Controllers/QuestionnaireController.php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $currentQuestion = session('currentQuestion', 1);
        $questionContent = $this->getQuestionContent($currentQuestion);

        return view('questionnaire.index', compact('currentQuestion', 'questionContent'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'response' => 'required|string|max:255',
        ]);

        $currentQuestion = $request->session()->get('currentQuestion', 1) + 1;
        $request->session()->put('currentQuestion', $currentQuestion);

        return back(); // Utilisez la méthode back() pour revenir à la page précédente
    }
    public function getQuestionContent($questionNumber)
    {
        $question = Question::where('question_number', $questionNumber)->first();
        return $question ? $question->content : null;
    }
}
