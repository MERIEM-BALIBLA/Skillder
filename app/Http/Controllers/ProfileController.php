<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::get();
        $yourSkills = auth()->user()->skills()->get();

        return view ('User.profile', compact('skills','yourSkills'));
    }
    
    public function profile(){
        $yourSkills = auth()->user()->skills()->get();
        return view ('User.profile', compact('yourSkills'));
    }

    
    public function edit()
    {
        $user = Auth::user();
    
        // Récupérer le mot de passe crypté de l'utilisateur
        // $encryptedPassword = $user->password;
    
            // Décrypter le mot de passe
            // $decryptedPassword = Crypt::decryptString($encryptedPassword);
    
            // Passer les données à la vue
            return view('User.update', compact('user'));
    
       
    }
    public function store(Request $request)
    {
        $skills = Skill::get();
        $user = auth()->user();
        $yourSkills = auth()->user()->skills()->get();
        
        $user -> skills()-> sync(
        $request->input('skill',[]));
        
        return view ('User.profile',compact('skills','yourSkills'));
    }

    public function show(){

    }

}
