<?php

namespace App\Models;
use App\Models\Realisateurs;
use App\Models\Salles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_films';
    protected $fillable = ['titre', 'date','image', 'durée', 'extrait'];

    public function Realisateurs()
    {
        return $this->belongsTo(Realisateurs::class,'real_id');
    }
    public function salles(){

        return $this->belongsTo(Salles::class, 'salle_id');
    }
}
