<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::orderByDesc('id')->get();
        return view('admin.abouts.index', compact('abouts'));
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
    public function store(StoreAboutRequest $request)
    {
        DB::transaction(function () use ($request){

            
            $validated = $request->validated();

            if($request->hasFile('img_about')) {
                $imgAboutPath = $request->file('img_about')->store('img_abouts', 'public'); 
                $validated['img_about'] = $imgAboutPath; 
            } else {
                $imgAboutPath = 'images/img_about-default.png'; 
            }

        

            About::create($validated); 
        });

        return redirect()->route('admin.abouts.index')->with('success', 'Congrats! You successfully added new data.');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        DB::transaction(function () use ($request, $about){

            
            $validated = $request->validated();

            if($request->hasFile('img_about')) {
                $imgAboutPath = $request->file('img_about')->store('img_abouts', 'public'); 
                $validated['img_about'] = $imgAboutPath; 
            } else {
                $imgAboutPath = 'images/img_about-default.png'; 
            }
            $about->update($validated); 
        });

        return redirect()->route('admin.abouts.index')->with('success', 'Congrats! You successfully added new data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
