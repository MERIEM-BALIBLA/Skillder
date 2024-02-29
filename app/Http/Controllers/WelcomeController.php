<?php

namespace App\Http\Controllers;

use App\Models\Annoucment;
use App\Models\Company;
// use App\Models\WelcomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::latest()->paginate(5);
        $annoucements = Annoucment::latest()->get();
        $user = auth()->user();
        if ($user && $user->hasRole('apprenant')) {
            // User Skills
            $userSkills = $user->skills->pluck('id')->toArray();
            // Initialiser un tableau pour stocker les annonces qui correspondent aux compétences de l'utilisateur
            $matchingAnnoucements = [];
            // Parcourir toutes les annonces
            foreach ($annoucements as $annoucement) {
                // Annoucements skills
                $requiredSkills = $annoucement->skills->pluck('id')->toArray();
        
                // array_intersect : verifier le matching puis la fonction de count->comptage
                $commonSkillsCount = count(array_intersect($userSkills, $requiredSkills));
        
                // vérification 
                if ($commonSkillsCount >= count($requiredSkills) * 0.5) {
                    // Ajouter cette annonce à la liste des annonces correspondantes
                    $matchingAnnoucements[] = $annoucement;
                }
            }
            $annoucements = $matchingAnnoucements;
        }
        // Retourner la vue avec les annonces à afficher
        return view('welcome', compact('companies', 'annoucements'));
    }
    
    // apply
    public function form($annoucment)
    {
        $annoucement = Annoucment::findOrFail($annoucment);
        return view('apply.form', compact('annoucement'));
    }

    // public function apply(Request $request) {
    //     $user = auth()->user();    
    //     // if(''){
    //     $annoucementId = $request->input('annoucement_id');
    //     $user->annoucements()->attach($annoucementId);
    //     return redirect()->route('welcome.index')->with('success', 'Application submitted successfully!');
    //     // }
    // }
    public function apply(Request $request) {
        $user = auth()->user();
        $annoucementId = $request->input('annoucement_id');
    
        // Vérifier si l'utilisateur a déjà postulé à cette annonce
        if ($user->annoucements->contains($annoucementId)) {
            return redirect()->route('welcome.index')->with('error', 'Vous avez déjà postulé à cette annonce!');
        }
    
        // Si l'utilisateur n'a pas déjà postulé, alors procéder à la demande de candidature
        $user->annoucements()->attach($annoucementId);
        return redirect()->route('welcome.index')->with('success', 'Application submitted successfully!');
    }
    
}
