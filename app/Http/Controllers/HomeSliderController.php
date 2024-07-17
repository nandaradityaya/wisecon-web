<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homes = HomeSlider::orderByDesc('id')->get();
        return view('admin.homes.index', compact('homes'));
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
    public function store(StoreHomeRequest $request)
    {
        DB::transaction(function () use ($request){

            
            $validated = $request->validated();

            if($request->hasFile('img_slider')) {
                $imgSliderPath = $request->file('img_slider')->store('img_sliders', 'public'); 
                $validated['img_slider'] = $imgSliderPath; 
            } else {
                $imgSliderPath = 'images/img_slider-default.png'; 
            }

        

            HomeSlider::create($validated); 
        });

        return redirect()->route('admin.homes.index')->with('success', 'Congrats! You successfully added new data.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeRequest $request, HomeSlider $home)
    {
        DB::transaction(function () use ($request, $home){

            
            $validated = $request->validated();

            if($request->hasFile('img_slider')) {
                $imgSliderPath = $request->file('img_slider')->store('img_sliders', 'public'); 
                $validated['img_slider'] = $imgSliderPath; 
            } else {
                $imgSliderPath = 'images/img_slider-default.png'; 
            }

        

            $home->update($validated); 
        });

        return redirect()->route('admin.homes.index')->with('success', 'Congrats! You successfully added new data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeSlider $home)
    {
        DB::beginTransaction();

        try {
            $home->delete(); 
            DB::commit(); 

            return redirect()->route('admin.homes.index')->with('success', 'Congrats! You successfully delete data.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.homes.index')->with('error', 'something error'); 
        }
    }
}
