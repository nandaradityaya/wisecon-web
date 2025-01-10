<?php

namespace App\Http\Controllers;

use App\Models\Apotek;
use Illuminate\Http\Request;

class ApotekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apoteks = Apotek::orderByDesc('id')->get();
        return view('admin.apoteks.index', compact('apoteks'));
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
    public function show(Apotek $apotek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apotek $apotek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apotek $apotek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apotek $apotek)
    {
        //
    }
}
