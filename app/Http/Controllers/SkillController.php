<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    
    public function index()
    {
        $skills = Skill::latest()->get();
        return view('skill.skill', compact('skills'));
    }
    
    public function store(Request $request)
    {
        // dd($request);
        $var = $request->validate([
            'skill' => 'required',
        ]);
        Skill::create($var);
        return redirect('skill');
    }

    public function edit(Skill $skill)
    {
        return view('skill.update',['skill'=>$skill]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, skill $skill)
    // {
    //     $skills = $request->validate([
    //         'skill' => 'required',
    //     ]);
    //     Skill::update($skills);
    //     return redirect('skill.skill');
    // }
 
    public function update(Request $request, Skill $skill)
    {
        $validatedData = $request->validate([
            'skill' => 'required', // Assurez-vous que 'skill' est le nom correct du champ dans votre formulaire
        ]);

        // Mettez à jour les compétences avec les données validées
        $skill->update($validatedData);

        // Redirigez l'utilisateur vers la vue des compétences après la mise à jour
        return redirect('skill');
    }

    public function destroy(Skill $skill){
        $skill -> delete();
        return redirect('skill');
    }

    public function delete(){
        Skill::truncate();
        redirect('skill');
        return  response()->json(['message' => 'Toutes les annonces ont été supprimées avec succès.']);
    }
}
