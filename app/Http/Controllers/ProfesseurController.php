<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Professeur;
use App\Models\User;
use Illuminate\Http\Request;
use RuntimeException;

use function PHPUnit\Framework\isEmpty;

class ProfesseurController extends Controller
{
    public function liste(){
        $profs = Professeur::all();
        return view('professeur/listeprof', ['profs'=>$profs]);
    }

    public function formulaireAjoutprof(){
        return view('professeur/ajoutprof');
    }

    public function ajout(Request $request){
        
        try {
            $prof = new Professeur();
            $prof->prenom = $request->prenom;
            $prof->nom = $request->nom;
            $prof->email = $request->email;
            $prof->etat = true;
            $prof->telephone = $request->telephone;

            $result = $prof->save();
            if ($result) {
                return redirect()->route('listeprof')->with('messageSuccess', 'Professeur ajouté');
            }
        } catch (\Throwable $th) {
            return redirect()->route('formulaireAjoutprof')->with('messageError', 'Veuiller renseigner tous les champs !!!');
        }
    }


    public function deleteprof($id){
        $prof = Professeur::find($id);
        $cours = Cours::where('id_prof','=',$prof->id)->count();
        // echo $cours;
        if ($prof != null && $cours > 0) {
            return redirect()->route('listeprof')->with('messageError', 'Le professeur '. $prof->prenom.' '.$prof->nom.' est lié à un cour ');

        }else if ($prof != null && $cours < 1 ){
            $prof->delete();
            return redirect()->route('listeprof')->with('messageSuccess', 'Le professeur '. $prof->prenom.' '.$prof->nom.' a été supprimer');
        }
    }

    public function changeretatprof($id){
        $prof = Professeur::find($id);
        if ($prof->etat == true) {
            $prof->etat = false;
            $prof->save();
            return redirect()->route('listeprof')->with('messageSuccess', "L'etat du professeur". $prof->prenom.' '.$prof->nom." est désactivé");

        }elseif ($prof->etat == false) {
            $prof->etat = true;
            $prof->save();
            return redirect()->route('listeprof')->with('messageSuccess', "L'etat du professeur ". $prof->prenom.' '.$prof->nom." est activé");

        }
    }


    public function editprof($id){
        $prof = Professeur::find($id);
        return view('professeur/editprof', ['prof'=>$prof]);
    }

    public function updateprof(Request $request){
        $prof = Professeur::find($request->id);
        $prof->prenom = $request->prenom;
        $prof->nom = $request->nom;
        $prof->email = $request->email;
        $prof->telephone = $request->telephone;
        $prof->etat = $request->etat;
        $result = $prof->save();
        if ($result) {
            return redirect()->route('listeprof')->with('messageSuccess', 'Le professeur a été modifier');
        }else {
            return redirect()->route('editprof', ['id'=>$request->id])->with('messageError', 'Erreur de modification');
        }
    }

    public function detailsprof($id){
        $prof = Professeur::find($id);
        $cours = Cours::where('id_prof','=',$id)->get();
        return view('professeur/detailsprof', ['prof'=>$prof, 'cours'=>$cours]);
    }
}
