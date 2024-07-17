<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFrequentlyAskedQuestionRequest;
use App\Http\Requests\UpdateFrequentlyAskedQuestionRequest;
use App\Models\FrequentlyAskedQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrequentlyAskedQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = FrequentlyAskedQuestion::orderByDesc('id')->get();
        return view('admin.faqs.index', compact('faqs'));
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
    public function store(StoreFrequentlyAskedQuestionRequest $request)
    {
        DB::transaction(function () use ($request){

            
            $validated = $request->validated();


            FrequentlyAskedQuestion::create($validated); 
        });

        return redirect()->route('admin.faqs.index')->with('success', 'Congrats! You successfully added FAQ.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FrequentlyAskedQuestion $frequentlyAskedQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FrequentlyAskedQuestion $frequentlyAskedQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFrequentlyAskedQuestionRequest $request, FrequentlyAskedQuestion $faq)
    {
        DB::transaction(function () use ($request, $faq){

            
            $validated = $request->validated();

            $faq->update($validated); 
        });

        return redirect()->route('admin.faqs.index')->with('success', 'Congrats! You successfully edit FAQ.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FrequentlyAskedQuestion $faq)
    {
        DB::beginTransaction();

        try {
            $faq->delete();
            DB::commit(); 

            return redirect()->route('admin.faqs.index')->with('success', 'Congrats! You successfully delete data.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.faqs.index')->with('error', 'something error'); 
        }
    }
}
