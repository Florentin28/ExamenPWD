<!-- Formulaire pour afficher la question et les boutons "Précédent" et "Suivant" -->
<form method="POST" action="{{ route('questionnaire.store') }}">
    @csrf

    <!-- Champ caché pour indiquer si le formulaire est soumis -->
    <input type="hidden" name="form_submitted" value="1">

    <!-- Partie du formulaire pour afficher la question -->
    <label for="response">Question {{ $currentQuestion }} : {{ $questionContent }}</label>
    <input type="text" name="response" id="response" required>

    <!-- Boutons "Précédent" et "Suivant" -->
    @if ($currentQuestion > 1)
        <button type="submit" name="previous" value="1">Précédent</button>
    @endif

    @if ($currentQuestion < 21)
        <button type="submit" name="next" value="1">Suivant</button>
    @endif
</form>

<!-- Affichage du message après la 21e question -->
@if ($currentQuestion > 21)
    <p>Merci d'avoir rempli le questionnaire!</p>
@endif
