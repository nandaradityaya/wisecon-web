<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderByDesc('id')->get();
        return view('admin.services.index', compact('services'));
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
    public function store(Request $request)
    {
        DB::transaction(function () use ($request){

            
            $validated = $request->validated();

            if($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public'); 
                $validated['thumbnail'] = $thumbnailPath; 
            } else {
                $thumbnailPath = 'images/thumbnail-default.png'; 
            }

        

            Service::create($validated); 
        });

        return redirect()->route('admin.services.index')->with('success', 'Congrats! You successfully added new data.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        DB::transaction(function () use ($request, $service){

            
            $validated = $request->validated();

            if($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public'); 
                $validated['thumbnail'] = $thumbnailPath; 
            } else {
                $thumbnailPath = 'images/thumbnail-default.png'; 
            }

        

            $service->update($validated); 
        });

        return redirect()->route('admin.services.index')->with('success', 'Congrats! You successfully added new data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
