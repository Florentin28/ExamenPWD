<!-- resources/views/questionnaire/index.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Formulaire de Questionnaire</title>
</head>

<body>
    <h1>Formulaire de Questionnaire</h1>

    <form method="POST" action="{{ route('questionnaire.store') }}">
        @csrf

        <label for="response">Question {{ $currentQuestion }} : {{ $questionContent }}</label>
        <input type="text" name="response" id="response" required>

        <button type="submit">Suivant</button>
    </form>

    @if ($currentQuestion > 21)
        <p>Merci d'avoir rempli le questionnaire!</p>
    @endif
</body>

</html>
