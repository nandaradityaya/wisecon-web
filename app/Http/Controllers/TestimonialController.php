<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderByDesc('id')->get();
        return view('admin.testimonials.index', compact('testimonials'));
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
    public function store(StoreTestimonialRequest $request)
    {
        DB::transaction(function () use ($request){

            
            $validated = $request->validated();

            Testimonial::create($validated); 
        });

        return redirect()->route('admin.testimonials.index')->with('success', 'Congrats! You successfully added new Testimonial.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        DB::transaction(function () use ($request, $testimonial){

            
            $validated = $request->validated();

            $testimonial->update($validated); 
        });

        return redirect()->route('admin.testimonials.index')->with('success', 'Congrats! You successfully edit Testimonial.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        DB::beginTransaction();

        try {
            $testimonial->delete();
            DB::commit(); 

            return redirect()->route('admin.testimonials.index')->with('success', 'Congrats! You successfully delete Testimonial.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.testimonials.index')->with('error', 'something error'); 
        }
    }
}
