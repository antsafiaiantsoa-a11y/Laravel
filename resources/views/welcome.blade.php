<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>
<body>
    <table>
    <h2 style="text-align:center;">Liste des élèves</h2>

<div style="text-align:center; margin-bottom:20px;">
    <a href="{{ url('/add') }}">➕ Ajouter un élève</a>
</div>

<form action="/" method="GET" style="text-align:center; margin-bottom:20px;">
    <input type="text" name="search" placeholder="Rechercher par nom ou prénom" value="{{ request('search') }}">
    <button type="submit">🔍 Rechercher</button>
</form>





  <tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Classe</th>
    <th>Année scolaire</th>
    <th>Actions</th>
  </tr>

  @forelse($eleves as $eleve)
    <tr>
      <td>{{ $eleve->id }}</td>
      <td>{{ $eleve->nom }}</td>
      <td>{{ $eleve->prenom }}</td>
      <td>{{ $eleve->classe }}</td>
      <td>{{ $eleve->annee_scolaire }}</td>
      <td>
        <a href="{{ url('edit/'.$eleve->id) }}">✏️ Modifier</a>
        <a href="{{ url('delete/'.$eleve->id) }}"
           onclick="return confirm('Supprimer cet élève ?');">🗑️ Supprimer</a>
      </td>
    </tr>
    {{ $eleves->onEachSide(1)->links('pagination::simple-default') }}



</div>

  @empty
    <tr><td colspan="6">Aucun élève trouvé</td></tr>
  @endforelse
</table>


</body>
</html>