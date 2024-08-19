<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers = Career::orderByDesc('id')->get();
        return view('admin.careers.index', compact('careers'));
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
    public function store(StoreCareerRequest $request)
    {
        DB::transaction(function () use ($request){

            
            $validated = $request->validated();

            if($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public'); 
                $validated['thumbnail'] = $thumbnailPath; 
            } else {
                $thumbnailPath = 'images/thumbnail-default.png'; 
            }

            $validated['slug'] = Str::slug($validated['title']);
        

            $career = Career::create($validated); 

            // // cek job desc
            // if(!empty($validated['job_descriptions'])) {
            //     // looping for insert data
            //     foreach($validated['job_descriptions'] as $jobdescriptionsText) {
            //         // langsung ambil dan create job_descriptions karna dia berelasi
            //         $career->job_descriptions()->create([
            //             'job_desc' => $jobdescriptionsText
            //         ]);
            //     }
            // }

            // // cek requirements
            // if(!empty($validated['requirements'])) {
            //     // looping for insert data
            //     foreach($validated['requirements'] as $requirementsText) {
            //         // langsung ambil dan create requirements karna dia berelasi
            //         $career->requirements()->create([
            //             'requirement' => $requirementsText
            //         ]);
            //     }
            // }
        });

        return redirect()->route('admin.careers.index')->with('success', 'Congrats! You successfully added new service.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareerRequest $request, Career $career)
    {
        DB::transaction(function () use ($request, $career){

            
            $validated = $request->validated();

            if($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public'); 
                $validated['thumbnail'] = $thumbnailPath; 
            } else {
                $thumbnailPath = 'images/thumbnail-default.png'; 
            }

            $validated['slug'] = Str::slug($validated['title']);

            $career->update($validated); 

            // // cek job desc
            // if(!empty($validated['job_descriptions'])) {
            //     $career->job_descriptions()->delete(); // delete first and update job_descriptions
                
            //     // looping
            //     foreach($validated['job_descriptions'] as $jobdescriptionText) {
            //         // langsung ambil dan create job_descriptions karna dia berelasi
            //         $career->job_descriptions()->create([
            //             'job_desc' => $jobdescriptionText
            //         ]);
            //     }
            // }

            // // cek requirement
            // if(!empty($validated['requirements'])) {
            //     $career->requirements()->delete(); // delete first and update requirements
                
            //     // looping
            //     foreach($validated['requirements'] as $requirementText) {
            //         // langsung ambil dan create requirements karna dia berelasi
            //         $career->requirements()->create([
            //             'requirement' => $requirementText
            //         ]);
            //     }
            // }
        });

        return redirect()->route('admin.careers.index')->with('success', 'Congrats! You successfully edit service.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        DB::beginTransaction();

        try {
            $career->delete(); 
            DB::commit(); 

            return redirect()->route('admin.careers.index')->with('success', 'Congrats! You successfully delete data.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.careers.index')->with('error', 'something error'); 
        }
    }
}
