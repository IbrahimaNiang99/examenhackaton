<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Professeur;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function liste(){
        $cours = Cours::all();
        $profs = Professeur::where('etat','=','1')->get();
        return view('cours/listecours', ['cours'=>$cours, 'profs'=>$profs]);
    }

    public function ajoutCour(Request $request){
        try {
            $cour = new Cours();
            $cour->matiere = $request->matiere;
            $cour->id_prof = $request->id_prof;
            $cour->duree = $request->duree;
            $cour->description = $request->description;
            $cour->etat = true;  

            if ($request->hasFile('photo')) {

                // Définir le nom de fichier avec horodatage
                // $filename = time().'.'.$request->photo->extension();  
                $filename = $request->getSchemeAndHttpHost().'/tof/img/'.time().'.'.$request->photo->extension();
                // Définir le chemin complet de destination    
                $path = $request->photo->move(public_path('/tof/img/'), $filename);
              
                // Déplacer le fichier téléchargé
                $cour->photo = $filename;
              }

            //   dd($cour);
            $result = $cour->save();

            if ($result) {
                return redirect()->route('listecours')->with('messageSuccess', 'Cours ajouté');
            }
        } catch (\Throwable $th) {
            return redirect()->route('listecours')->with('messageError', 'Veuiller renseigner tous les champs !!!');
        }
    }

    public function deletecours($id){
        $coursdelete = Cours::find($id);
        if ($coursdelete != null){
            $coursdelete->delete();
            return redirect()->route('listecours')->with('messageSuccess', "Le cour de ".$coursdelete->matiere."  a été supprimer...");
        }
    }

    public function updatecours(Request $request ,$id){
        $crs = Cours::find($id);
        $crs->matiere = $request->matiere;
        $crs->id_prof = $request->id_prof;
        $crs->duree = $request->duree;
        $crs->etat = $request->etat;

        $result = $crs->save();
        if ($result) {
            return redirect()->route('listecours')->with('messageSuccess', "Le cour de a été modifier...");
        }else {
            return redirect()->route('listecours')->with('messageError', "Erreur de la modification...");
        }
    }


    public function detailscour($id){
        $cour = Cours::find($id);
        return view('cours/detailscour', ['cour'=>$cour]);
    }
}
