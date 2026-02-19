<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier un élève</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
  <h2>Modifier un élève</h2>
  <form action="/update/{{ $eleve->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nom :</label>
    <input type="text" name="nom" value="{{ $eleve->nom }}" required><br><br>

    <label>Prénom :</label>
    <input type="text" name="prenom" value="{{ $eleve->prenom }}" required><br><br>

    <label>Classe :</label>
    <input type="text" name="classe" value="{{ $eleve->classe }}" required><br><br>

    <label>Année scolaire :</label>
    <input type="text" name="annee_scolaire" value="{{ $eleve->annee_scolaire }}" required><br><br>

  

    <button type="submit">Mettre à jour</button>
  </form>
</body>
</html>
