<?php

namespace App\Http\Controllers;

use App\Models\Annoucment;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    // public function index($annoucment)
    // {
    //     $annoucement = Annoucment::findOrFail($annoucment);
    //     return view('apply.form', compact('annoucement'));
    // }
    

    public function dash() {
        // Récupérez les annonces avec les utilisateurs associés qui ont déjà postulé
        $announcements = Annoucment::has('users')->latest()->paginate(5);
        // Passez les annonces à la vue
        return view('apply.apply', compact('announcements'));
    }
    
    public function send(){
        return redirect('/');
    }
  

    // public function apply(Request $request,Company  $company, Annoucment $annoucment) {
    //     // Récupérez l'utilisateur authentifié ou le modèle utilisateur approprié
    //     $user = auth()->user();
    
    //     // Récupérez l'ID de l'annonce à laquelle l'utilisateur postule à partir des données du formulaire
    //     $annoucementId = $request->input('annoucement_id');
    //     $companies = $company;
    //     $announcements = $annoucment;
    
    //     // Attachez l'utilisateur à l'annonce
    //     $user->annoucements()->attach($annoucementId);
    
    //     // Redirigez l'utilisateur ou affichez un message de réussite
    //     // return redirect()->back()->with('success', 'Application submitted successfully!');
    //     return view('welcome',compact('companies', 'announcements'))->with('success', 'Application submitted successfully!');
    // }
}
