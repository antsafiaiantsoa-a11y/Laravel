<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleve; // modèle Eloquent

class EleveController extends Controller
{
    // Afficher la liste des élèves avec recherche et pagination
    public function index(Request $request)
    {
        $query = Eleve::orderBy('id', 'desc');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nom', 'like', "%{$search}%")
                  ->orWhere('prenom', 'like', "%{$search}%");
            });
        }

        $eleves = $query->paginate(5); // 5 élèves par page

        return view('welcome', compact('eleves'));
    }

    // Formulaire d'ajout
    public function create()
    {
        return view('add');
    }

    // Enregistrer un nouvel élève
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'classe' => 'required|string|max:50',
            'annee_scolaire' => 'required|string|max:20',
            
        ]);

        Eleve::create($request->only([
            'nom',
            'prenom',
            'classe',
            'annee_scolaire',
            
        ]));

        return redirect('/')->with('success', 'Élève ajouté avec succès');
    }

    // Formulaire de modification
    public function edit($id)
    {
        $eleve = Eleve::findOrFail($id);
        return view('edit', compact('eleve'));
    }

    // Mettre à jour un élève
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'classe' => 'required|string|max:50',
            'annee_scolaire' => 'required|string|max:20',
           
        ]);

        $eleve = Eleve::findOrFail($id);
        $eleve->update($request->only([
            'nom',
            'prenom',
            'classe',
            'annee_scolaire',
       
        ]));

        return redirect('/')->with('success', 'Élève modifié avec succès');
    }

    // Supprimer un élève
    public function destroy($id)
    {
        $eleve = Eleve::findOrFail($id);
        $eleve->delete();

        return redirect('/')->with('success', 'Élève supprimé avec succès');
    }
}
