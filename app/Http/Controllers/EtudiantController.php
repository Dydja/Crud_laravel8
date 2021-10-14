<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Models\Classe;

class EtudiantController extends Controller
{
    //Lister All students
   public function index(){
       $etudiants = Etudiant::orderBy("nom","asc")->paginate(5);
        return view ("etudiant",compact("etudiants"));
    }
    //for le formulaire
    public function create(){
        $classe = Classe::all();//la liste de toute les classes
        return view("createEtudiant",compact("classe")); //compact prends la valeur de la varibale
    }

    //Formulaire de modification
       public function edit(Etudiant $etudiant){
        $classe = Classe::all();//la liste de toute les classes
        return view("editEtudiant",compact("etudiant","classe")); //compact prends la valeur de la varibale
    }

    //le traitement du formulaire
    public function store(Request $request){
      //le champ doit être rempli obligatoirement
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "classroom_id" => "required"
        ]);

        //Etudiant::create($request->all());
        Etudiant::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "classroom_id"=>$request->classroom_id
        ]);
        //reviens sur la même page avec un message de succès
        return back()->with("success","Etudiant ajouté avec succès");
    }

    //le traitement du formulaire pour la suppression
    public function update(Request $request , Etudiant $etudiant){
        //le champ doit être rempli obligatoirement
          $request->validate([
              "nom" => "required",
              "prenom" => "required",
              "classroom_id" => "required"
          ]);

          //Etudiant::create($request->all());
         $etudiant->update([
              "nom"=>$request->nom,
              "prenom"=>$request->prenom,
              "classroom_id"=>$request->classroom_id
          ]);
          //reviens sur la même page avec un message de succès
          return back()->with("success","Mise à jour effectuée avec succès");
      }


    //Fonction de suppression
    public function delete(Etudiant $etudiant){
        $nom_complet = $etudiant->nom . " " . $etudiant->prenom;
        $etudiant->delete();

        return back()->with("successDelete","L'etudiant(e) $nom_complet a été supprimé avec succès");

    }
}
