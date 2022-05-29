<?php

namespace App\Http\Controllers;


use App\Models\Films;
use App\Models\Realisateurs;
use App\Models\Salles;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmsController extends Controller
{





    public function getall()
    {
        $films = Films::with('realisateurs')->get();
        $real = Realisateurs::all();
        $salles = Salles::all();
       
        return view('films', [

            
            'films' => $films,
            'reals' => $real,
            'salles' => $salles,
            



        ]);

    }

    public function accueil()
    {
        $films = Films::with('realisateurs')->get();
        $real = Realisateurs::all();
        $salles = Salles::all();
       
        return view('welcome', [

            
            'films' => $films,
            'reals' => $real,
            'salles' => $salles,
            



        ]);

    }



    public function add(Request $request){

       
     
    
        $validate = $request->validate([
            'titre' => 'required|max:150',
            'extrait' => 'required|max:150',
            'realisateurs' => 'required|exists:realisateurs,id',
            'salles' => 'required|exists:salles,id',
           
    
    
        ]);
    
        $film = new Films();
    
        $film->titre = $validate['titre'];
        $film->extrait = $validate['extrait'];
      
        //$film->affiche = $validate['affiche'];
      
        $film->real_id = $validate['realisateurs'];
        $film->salle_id = $validate['salles'];
    
        $film->save();
    
    
        return redirect()->route('films');
        
        
       
 
        
 
     }
     public function create(Request $request)
    {
        $path = Storage::disk('public')->put('img', $request->file('images'));
        
        $films = Films::with('realisateurs')->get();
        $real = Realisateurs::all();
        $salles = Salles::all();
        $films = Films::create([
            'titre' => $request->titre,
            'extrait' => $request->extrait,
            'date' => NOW(),
            'réalisateurs' => $real,
            'salles'=> $salles,
            'durée' => $request->durée,
            'image'=> $path,
     

        ]);

      
        
        $films->save();
       

        return redirect()->route('films')->with('success', 'Film ajouté');
    }

     //dd($request->file('affiche'));

     public function update(Request $request, $id_films)
     {
 
        $path = Storage::disk('public')->put('img', $request->file('images'));    //chemin + nom image
        $film = Films::find($id_films);
        $film->titre = $request->titre;
       
        $film->image = $path;
        $film->extrait = $request->extrait;
        
        $film->date = NOW();
        $film->real_id= $request->realisateurs;
        $film->save();
        
      
        return redirect()->route('films');
     }
 
 
     public function delete($id_films)
     {
         $film = Films::where('id_films', '=', $id_films);
         $film->delete();
         return redirect()->route('films');
     }

}
