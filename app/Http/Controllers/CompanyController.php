<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Middleware\RoleMiddleware;

class CompanyController extends Controller
{
    // function __construct()
    // {
    //     $this -> middleware('auth');
    //     $this->middleware(['permission:manage_companies'], ['only' => ['index']]);
    // }
    public function index()
    {
        $companies = Company::latest()->paginate(5) ;
        // ->with('i', (request()->input('page', 1) - 1) * 5);

        return view('company.company',compact('companies'));
    }

    public function create(CompanyRequest $request)
    {
        // dd($request);

    
        Company::create($request->validated());
    
        return redirect('company');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('company.update',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company)
    {

        $company->update($request->validated());
        return redirect('company');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('company');
    }

    public function show($id)
    {
        // echo 'helo world';
        $companies = Company::findOrFail($id);
        return view('company.singlePage', compact('companies'));
    }

    // public function deleteAll()
    // {
    //     Company::truncate();
    //     redirect('companies');
    //     return   response()->json(['message' => 'Toutes les annonces ont été supprimées avec succès.']);
    // }

    public function deleteAll()
    {
        Company::truncate();
        redirect('company');
        return   response()->json(['message' => 'Toutes les annonces ont été supprimées avec succès.']);
    }

}
