<?php

use App\Http\Controllers\AnnoucmentController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/statistic', function () {
    return view('statistic/statistic');
});

// home
Route::get('/',[WelcomeController::class,'index'])->name('welcome.index');
// Route::get('/',[WelcomeController::class,'annoucement'])->name('welcome.annoucement');

// form
// Route::get('form/{annoucment}', [ApplyController::class, 'index'])->name('form');
Route::get('form/{annoucment}', [WelcomeController::class, 'form'])->name('form');
Route::get('form/', [WelcomeController::class, 'apply'])->name('form.form');




// company
Route::middleware('role:Admin')->group(function () {
Route::get('/company',[CompanyController::class,'index'])->name('company.company');

Route::post('/company/create',[CompanyController::class,'create'])->name('company.create');

Route::get('/company/show/{company}', [CompanyController::class, 'show'])->name('company.singlePage')->middleware('role:admin');

Route::delete('/companies/deleteAll', [CompanyController::class, 'deleteAll'])->name('companies.deleteAll');

Route::get('/company/edit/{company}',[CompanyController::class,'edit'])->name('company.edit');
Route::patch('company/update/{company}',[CompanyController::class,'update'])->name('company.update');
Route::delete('company/destroy/{company}',[CompanyController::class,'destroy'])->name('company.delete');
});

// annoucement
Route::middleware('role:Admin')->group(function () {
Route::get('/annoucement',[AnnoucmentController::class,'index'])->name('annoucement.annoucement');

Route::get('/annoucement/show/{annoucment}', [AnnoucmentController::class, 'show'])->name('annoucement.singlePage');

Route::delete('/annoucements/deleteAll', [AnnoucmentController::class, 'deleteAll'])->name('annoucements.deleteAll');

Route::post('annoucement/create',[AnnoucmentController::class,'create'])->name('annoucement.create');
Route::get('annoucement/edit/{annoucment}',[AnnoucmentController::class,'edit'])->name('annoucement.edit');
Route::patch('annoucement/update/{annoucment}',[AnnoucmentController::class,'update'])->name('annoucement.update');
Route::delete('annoucement/destroy/{annoucment}',[AnnoucmentController::class,'destroy'])->name('annoucment.destroy');

Route::post('annoucement/store/{annoucment}',[AnnoucmentController::class,'store'])->name('annoucement.store');

Route::delete('annoucement/delete/{annoucment}/{skillId}', [AnnoucmentController::class, 'deleteSkill'])
    ->name('annoucement.deleteSkill');


// });
});

// skills 
Route::middleware('role:Admin')->group(function () {
// Route::group(['middleware' => ['role:Admin']], function () {
Route::resource('skill', SkillController::class);
Route::delete('/annoucements/delete', [SkillController::class, 'delete'])->name('skill.delete');
// });
});

// apply
Route::get('/apply',[ApplyController::class,'dash'])->name('apply.apply');

//profile
Route::resource('profile', ProfileController::class);
Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('profile', [ProfileController::class, 'index']);

Route::delete('profile/{profile}', [ProfileController::class, 'destroy'])->name('profile.destroy');

//update Profile form
// Route::get('profile/update', [ProfileController::class, 'edit'])->name('profile.edit.form');

//sattistic
Route::resource('/Statistic', StatisticController::class);
//--------//

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

