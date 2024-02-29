@extends('layout.navigation')
@section('content')

<form action="" method="POST">
    @csrf
    <h3>Update your information</h3>

    <div>
        <!-- Afficher la photo de profil si le profil de l'utilisateur existe -->
        {{-- @if(Auth::user()->profile)
            <img src="{{ Auth::user()->profile->photo ? asset(Auth::user()->profile->photo) : asset('chemin_vers_votre_photo_par_défaut') }}" alt="Photo de profil">
        @else
            <!-- Si l'utilisateur n'a pas de profil, afficher une image par défaut -->
            <img src="{{ asset('chemin_vers_votre_photo_par_défaut') }}" alt="Photo de profil par défaut">
        @endif --}}
    </div>
    
    <div class="relative z-0 w-full mb-5 group">
        <!-- Champ pour mettre à jour le nom -->
        <input class="px-4 py-2 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" type="text" name="name" placeholder="Your name" value="{{$user->name}}">
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <!-- Champ pour mettre à jour l'e-mail -->
        <input class="px-4 py-2 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" type="email" name="email" placeholder="Your email" value="{{$user->email}}">
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <!-- Champ pour mettre à jour le mot de passe -->
        <input class="px-4 py-2 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" type="password" name="password" placeholder="Your password" value="{{ $user->password }}">
    </div>

    <div class="mx-auto">
        <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow">
            <div class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
            <span class="relative text-black group-hover:text-white">Save</span>
        </button>
    </div>
</form>

@endsection
