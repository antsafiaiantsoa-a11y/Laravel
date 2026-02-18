<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $table = 'eleves';

    // Garde les timestamps car ta table contient created_at et updated_at
    public $timestamps = true;

    protected $fillable = ['nom', 'prenom', 'classe', 'annee_scolaire'];
}
