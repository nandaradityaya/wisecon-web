<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::orderByDesc('id')->with('career')->get();
        return view('admin.applications.index', compact('applications'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        DB::beginTransaction();

        try {
            $application->delete(); 
            DB::commit(); 

            return redirect()->route('admin.applications.index')->with('success', 'Congrats! You successfully delete data.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.applications.index')->with('error', 'something error'); 
        }
    }
}
