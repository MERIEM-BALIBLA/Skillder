<?php

namespace App\Http\Controllers;

use App\Models\Annoucment;
use App\Models\Company;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        // Compter le nombre total d'utilisateurs, de sociétés et d'annonces
        $totalUsers = User::count(); 
        $totalCompanies = Company::count(); 
        $totalAnnouncements = Annoucment::count(); 
        
        // Obtenir les 3 premiers utilisateurs avec le nombre maximal de compétences
        $usersWithMaxSkills = User::select('users.*')
        ->join('user_skill', 'users.id', '=', 'user_skill.user_id')
        ->selectRaw('users.*, COUNT(user_skill.skill_id) as num_skills')
        ->groupBy('users.id')
        ->orderByDesc('num_skills')
        ->take(3)
        ->get();

        // Obtenir les 3 premiers utilisateurs avec le nombre maximal de annoncements
        $usersWithMaxAnnouncements = User::select('users.*')
            ->join('annoucement_user', 'users.id', '=', 'annoucement_user.user_id')
            ->selectRaw('users.*, COUNT(annoucement_user.annoucement_id) as num_announcements')
            ->groupBy('users.id')
            ->orderByDesc('num_announcements')
            ->take(3)
            ->get();


    $companiesMaxAnnouncements = DB::table('annoucments')
    ->join('companies', 'annoucments.company_id', '=', 'companies.id')
    ->select('companies.company_name', 'annoucments.title as annoucment_title', DB::raw('COUNT(annoucments.id) as announcements_num'))
    ->groupBy('companies.company_name', 'annoucments.title')
    ->get();

    $announcmentApplly = DB::table('annoucement_user')->select()->distinct('annoucement_id')->count('annoucement_id');

        return view('statistic.statistic', compact('totalUsers', 'totalCompanies', 'totalAnnouncements', 'usersWithMaxSkills', 'usersWithMaxAnnouncements', 'companiesMaxAnnouncements','announcmentApplly'));
    }
}
