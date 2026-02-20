<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Eleve;
use App\Models\Matiere;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // Liste des notes
    public function index()
    {
        $notes = Note::with(['eleve','matiere'])->orderBy('id','desc')->paginate(10);
        return view('notes.index', compact('notes'));
    }

    // Formulaire d'ajout
    public function create()
    {
        $eleves = Eleve::all();
        $matieres = Matiere::all();
        return view('notes.create', compact('eleves','matieres'));
    }

    // Enregistrer une nouvelle note
    public function store(Request $request)
    {
        $request->validate([
            'eleve_id' => 'required|exists:eleves,id',
            'matiere_id' => 'required|exists:matieres,id',
            'valeur' => 'required|numeric|min:0|max:20',
        ]);

        Note::create($request->only(['eleve_id','matiere_id','valeur']));

        return redirect()->route('notes.index')->with('success','Note ajoutée avec succès');
    }

    // Formulaire de modification
    public function edit($id)
    {
        $note = Note::findOrFail($id);
        $eleves = Eleve::all();
        $matieres = Matiere::all();
        return view('notes.edit', compact('note','eleves','matieres'));
    }

    // Mettre à jour une note
    public function update(Request $request, $id)
    {
        $request->validate([
            'eleve_id' => 'required|exists:eleves,id',
            'matiere_id' => 'required|exists:matieres,id',
            'valeur' => 'required|numeric|min:0|max:20',
        ]);

        $note = Note::findOrFail($id);
        $note->update($request->only(['eleve_id','matiere_id','valeur']));

        return redirect()->route('notes.index')->with('success','Note modifiée avec succès');
    }

    // Supprimer une note
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->route('notes.index')->with('success','Note supprimée avec succès');
    }
}
