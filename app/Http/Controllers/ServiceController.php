<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
    public function store(StoreServiceRequest $request)
    {
        DB::transaction(function () use ($request){

            
            $validated = $request->validated();

            if($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public'); 
                $validated['thumbnail'] = $thumbnailPath; 
            } else {
                $thumbnailPath = 'images/thumbnail-default.png'; 
            }

            if($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons', 'public'); 
                $validated['icon'] = $iconPath; 
            } else {
                $iconPath = 'images/icon-default.png'; 
            }

            $validated['slug'] = Str::slug($validated['title']);
        

            $service = Service::create($validated); 

            // cek keyfetrues
            if(!empty($validated['key_features'])) {
                // looping for insert data
                foreach($validated['key_features'] as $keyfeatureText) {
                    // langsung ambil dan create key_features karna dia berelasi
                    $service->key_features()->create([
                        'body' => $keyfeatureText
                    ]);
                }
            }

            // cek our approaches
            if(!empty($validated['our_approaches'])) {
                // looping for insert data
                foreach($validated['our_approaches'] as $ourApproachesText) {
                    // langsung ambil dan create our_approaches karna dia berelasi
                    $service->our_approaches()->create([
                        'body' => $ourApproachesText
                    ]);
                }
            }
        });

        return redirect()->route('admin.services.index')->with('success', 'Congrats! You successfully added new service.');
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
    public function update(UpdateServiceRequest $request, Service $service)
    {
        DB::transaction(function () use ($request, $service){

            
            $validated = $request->validated();

            if($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public'); 
                $validated['thumbnail'] = $thumbnailPath; 
            } else {
                $thumbnailPath = 'images/thumbnail-default.png'; 
            }

            if($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons', 'public'); 
                $validated['icon'] = $iconPath; 
            } else {
                $iconPath = 'images/icon-default.png'; 
            }

            $validated['slug'] = Str::slug($validated['title']);

            $service->update($validated); 

            // cek keyfeatures
            if(!empty($validated['key_features'])) {
                $service->key_features()->delete(); // delete dulu keyfeaturesnya baru deh update dgn yg baru
                
                // looping
                foreach($validated['key_features'] as $keyfeatureText) {
                    // langsung ambil dan create key_features karna dia berelasi
                    $service->key_features()->create([
                        'body' => $keyfeatureText
                    ]);
                }
            }

            // cek our approaches
            if(!empty($validated['our_approaches'])) {
                $service->our_approaches()->delete(); // delete dulu keyfeaturesnya baru deh update dgn yg baru
                
                // looping
                foreach($validated['our_approaches'] as $ourApproachesText) {
                    // langsung ambil dan create our_approaches karna dia berelasi
                    $service->our_approaches()->create([
                        'body' => $ourApproachesText
                    ]);
                }
            }
        });

        return redirect()->route('admin.services.index')->with('success', 'Congrats! You successfully edit service.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        DB::beginTransaction();

        try {
            $service->delete(); 
            DB::commit(); 

            return redirect()->route('admin.services.index')->with('success', 'Congrats! You successfully delete data.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.services.index')->with('error', 'something error'); 
        }
    }
}
