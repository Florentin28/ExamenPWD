<?php
// app/Http/Controllers/QuestionnaireController.php

namespace App\Http\Controllers;

// app/Http/Controllers/QuestionnaireController.php

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
        // Incrémentez ou décrémentez le numéro de la question dans la session
        $currentQuestion = $request->session()->get('currentQuestion', 1);

        // Si le bouton "Suivant" est cliqué et le champ est vide, redirigez avec un message d'erreur
        if ($request->has('next') && empty($request->input('response'))) {
            return back()->withErrors(['response' => 'Veuillez renseigner ce champ.']);
        }

        // Si le bouton "Précédent" est cliqué, décrémentez le numéro de la question
        if ($request->has('previous') && $currentQuestion > 1) {
            $currentQuestion--;
        }

        // Si le bouton "Suivant" est cliqué, incrémentez le numéro de la question
        if ($request->has('next')) {
            $currentQuestion++;
        }

        $request->session()->put('currentQuestion', $currentQuestion);

        return back(); // Utilisez la méthode back() pour revenir à la page précédente
    }








    public function getQuestionContent($questionNumber)
    {
        $question = Question::where('question_number', $questionNumber)->first();

        return $question ? $question->content : null;
    }
}
