<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

    public function ajoututilisateur(UserRequest $userRequest){
        try {
            $user = new User();
            $user->etat = true;
            $user->name =  $userRequest->prenom." ".$userRequest->nom;
            $user->email =  $userRequest->email;
            $user->telephone =  $userRequest->telephone;
            $user->profil =  $userRequest->profil;
            $user->password = Hash::make($userRequest->password, [
                'rounds'=>12
            ]);
            $result = $user->save();

            if ($result) {
                return redirect()->route('listeutilisateur')->with('messageSuccess', 'Utilisateur ajouté');
            }else {
                return redirect()->route('listeutilisateur')->with('messageError', 'Utilisateur non ajouté');
                
            }
          
            
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }

    public function editapprenant($id){
        $app = User::find($id);
        return view('apprenant/editapprenant', ['app'=>$app]);
    }
    
    public function updateapprenant(Request $request){
        $app = User::find($request->id);
        $app->name = $request->name;
        $app->email = $request->email;
        $app->telephone = $request->telephone;
        $app->etat = $request->etat;
        $result = $app->save();
        if ($result) {
            return redirect()->route('listeApprenant')->with('messageSuccess', 'Apprenant modifier');
        }else {
            return redirect()->route('editapprenant', ['id'=>$request->id])->with('messageError', 'Erreur de modification');
        }

    }

    public function delete($id){
        $app = User::find($id);
        if ($app != null){
            $app->delete();
            return redirect()->route('listeApprenant')->with('messageSuccess', 'Votre apprenant a été supprimer');
        }
    }

    public function listeApprenant(){
        $apprenant = User::all()->where('profil','=','apprenant');
        return view('apprenant/listeapprenant', ['apprenant' => $apprenant]);
    }

    public function listeUsers(){
        $users = User::all();
        return view('utilisateur/liste', ['users' => $users]);
    }

    public function unauthorizedaccess(){
        return view('unauthorizedaccess');
    }

    public function changermdp($id){
        $user = User::find($id);
        return view('changermdp', ['user'=>$user]);
    }
}

?>