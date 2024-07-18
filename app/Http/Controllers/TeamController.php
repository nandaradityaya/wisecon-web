<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::orderByDesc('id')->get();
        return view('admin.teams.index', compact('teams'));
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
    public function store(StoreTeamRequest $request)
    {
        DB::transaction(function () use ($request){

            
            $validated = $request->validated();

            if($request->hasFile('img_team')) {
                $imgSliderPath = $request->file('img_team')->store('img_teams', 'public'); 
                $validated['img_team'] = $imgSliderPath; 
            } else {
                $imgSliderPath = 'images/img_team-default.png'; 
            }

        

            Team::create($validated); 
        });

        return redirect()->route('admin.teams.index')->with('success', 'Congrats! You successfully added new team.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        DB::transaction(function () use ($request, $team){

            
            $validated = $request->validated();

            if($request->hasFile('img_team')) {
                $imgSliderPath = $request->file('img_team')->store('img_teams', 'public'); 
                $validated['img_team'] = $imgSliderPath; 
            } else {
                $imgSliderPath = 'images/img_team-default.png'; 
            }

        

            $team->update($validated); 
        });

        return redirect()->route('admin.teams.index')->with('success', 'Congrats! You successfully edit team.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        DB::beginTransaction();

        try {
            $team->delete(); 
            DB::commit(); 

            return redirect()->route('admin.teams.index')->with('success', 'Congrats! You successfully delete data.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.teams.index')->with('error', 'something error'); 
        }
    }
}
