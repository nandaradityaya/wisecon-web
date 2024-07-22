<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyProfileRequest;
use App\Http\Requests\UpdateCompanyProfileRequest;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyProfiles = CompanyProfile::orderByDesc('id')->get();
        return view('admin.companyProfiles.index', compact('companyProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyProfileRequest $request)
    {
        DB::transaction(function () use ($request){

            
            $validated = $request->validated();

            if($request->hasFile('compro')) {
                $comproPath = $request->file('compro')->store('compros', 'public'); 
                $validated['compro'] = $comproPath; 
            } else {
                $comproPath = 'images/compro-default.png'; 
            }

        

            CompanyProfile::create($validated); 
        });

        return redirect()->route('admin.companyProfiles.index')->with('success', 'Congrats! You successfully added new Company Profile.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyProfileRequest $request, CompanyProfile $companyProfile)
    {
        DB::transaction(function () use ($request, $companyProfile){

            
            $validated = $request->validated();

            if($request->hasFile('compro')) {
                $comproPath = $request->file('compro')->store('compros', 'public'); 
                $validated['compro'] = $comproPath; 
            } else {
                $comproPath = 'images/compro-default.png'; 
            }

        

            $companyProfile->update($validated); 
        });

        return redirect()->route('admin.companyProfiles.index')->with('success', 'Congrats! You successfully edit Company Profile.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyProfile $companyProfile)
    {
        DB::beginTransaction();

        try {
            $companyProfile->delete();
            DB::commit(); 

            return redirect()->route('admin.companyProfiles.index')->with('success', 'Congrats! You successfully delete Company Profile.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.companyProfiles.index')->with('error', 'something error'); 
        }
    }
}
