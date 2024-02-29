<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnoucmentRequest;
use App\Models\Annoucment;
use App\Http\Requests\StoreAnnoucmentRequest;
use App\Http\Requests\UpdateAnnoucmentRequest;
use App\Models\Company;
use App\Models\Skill;
use Illuminate\Http\Request;

class AnnoucmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annoucements = Annoucment::latest()->paginate(5);
        $companies = Company::all();
        $skills = Skill::get();
        return view('annoucement.annoucement',compact('annoucements','companies','skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create(Request $request)
    // {
    //     // dd($request);
    //     $annoucments=$request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //         'company_id' => 'required'
    //     ]);
    //     Annoucment::create($annoucments);
    //     return redirect('annoucement');
    // }
     public function create(AnnoucmentRequest $request)
    {
       
        Annoucment::create($request->validated());
        return redirect('annoucement');
    }

    public function store(Request $request, $annoucement) {
        // Validez la requête si nécessaire
    
        // Récupérez l'annonce à partir de son ID
        $announcement = Annoucment::findOrFail($annoucement);
    
        // Récupérez l'ID de la compétence sélectionnée
        $skillId = $request->input('skill');
    
        // Attachez la compétence à l'annonce
        $announcement->skills()->attach($skillId);
    
        // Redirigez l'utilisateur après l'ajout de la compétence
        return redirect('annoucement');
    }    
    
    public function edit(Annoucment $annoucment)
    {
        // dd($annoucment);
        $companies = Company::all();
        return view('annoucement.update',['annoucement'=>$annoucment, 'companies'=>$companies]);
    }

    public function update(AnnoucmentRequest $request, Annoucment $annoucment)
    {
        $annoucment->update($request->validated());
        return redirect('annoucement');
    }
 
    public function destroy(Annoucment $annoucment)
        {
            $annoucment->delete();
            return redirect('annoucement');
        }

    // public function deleteSkill(Annoucment $annoucement){
    //     $annoucement -> skills()->detach();
    //     return redirect('annoucement');
    // }
    public function deleteSkill($annoucmentId, $skillId){
        $annoucement = Annoucment::findOrFail($annoucmentId);
        $annoucement->skills()->detach($skillId);
        return redirect()->back()->with('success', 'Skill deleted successfully');
    }
    
    public function show($id)
    {
        $annoucements = Annoucment::findOrFail($id);
        return view('annoucement.singlePage', compact('annoucements'));
    }

    public function deleteAll()
    {
        Annoucment::truncate();
        redirect('annoucement');
        return   response()->json(['message' => 'Toutes les annonces ont été supprimées avec succès.']);
    }
}
