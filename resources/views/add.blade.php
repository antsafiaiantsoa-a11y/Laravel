<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un élève</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>
<body>
  <h2>Ajouter un élève</h2>
  <form action="/add" method="POST">
    @csrf
    <label>Nom :</label>
    <input type="text" name="nom" required><br><br>

    <label>Prénom :</label>
    <input type="text" name="prenom" required><br><br>

    <label>Classe :</label>
    <input type="text" name="classe" required><br><br>

    <label>Année scolaire :</label>
    <input type="text" name="annee_scolaire" required><br><br>

    <button type="submit">Ajouter</button>
  </form>
</body>
</html>
