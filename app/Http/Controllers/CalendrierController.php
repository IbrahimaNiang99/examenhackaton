<?php

namespace App\Http\Controllers;

use App\Models\Calendrier;
use App\Models\Cours;
use App\Models\Professeur;
use Illuminate\Http\Request;

class CalendrierController extends Controller
{
    public function listecalendrier(){
        $cals = Calendrier::all();
        $profs = Professeur::all();
        $cours = Cours::all();
        return view('calendrier/liste', ['cals'=>$cals, 'profs'=>$profs, 'cours'=>$cours]);
    }

    public function ajoutCalendar(Request $request){
        $calendar = new Calendrier();
        $calendar->jour = $request->jour;
        $calendar->heuredebut = $request->heuredebut;
        $calendar->heurefin = $request->heurefin;
        $calendar->cours = $request->cours;
        $calendar->professeur = $request->professeur;

        $result = $calendar->save();

        if ($result) {
            return redirect()->route('listecalendrier')->with('messageSuccess', 'Le cours est ajouté');
        }
    }
}
