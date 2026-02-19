<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public function index()
    {
        $matieres = Matiere::all();
        return view('matieres.index', compact('matieres'));
    }

    public function create()
    {
        return view('matieres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|integer|min:1',
        ]);

        Matiere::create($request->only(['nom', 'coefficient']));

        return redirect()->route('matieres.index')->with('success', 'Matière ajoutée avec succès');
    }

    public function edit($id)
    {
        $matiere = Matiere::findOrFail($id);
        return view('matieres.edit', compact('matiere'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|integer|min:1',
        ]);

        $matiere = Matiere::findOrFail($id);
        $matiere->update($request->only(['nom', 'coefficient']));

        return redirect()->route('matieres.index')->with('success', 'Matière modifiée avec succès');
    }

    public function destroy($id)
    {
        $matiere = Matiere::findOrFail($id);
        $matiere->delete();

        return redirect()->route('matieres.index')->with('success', 'Matière supprimée avec succès');
    }
}


{
    //
    
}
