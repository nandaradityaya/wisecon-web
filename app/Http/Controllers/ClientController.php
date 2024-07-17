<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::orderByDesc('id')->get();
        return view('admin.clients.index', compact('clients'));
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
    public function store(StoreClientRequest $request)
    {
        DB::transaction(function () use ($request){

            
            $validated = $request->validated();

            if($request->hasFile('client_img')) {
                $imgSliderPath = $request->file('client_img')->store('client_imgs', 'public'); 
                $validated['client_img'] = $imgSliderPath; 
            } else {
                $imgSliderPath = 'images/client_img-default.png'; 
            }

        

            Client::create($validated); 
        });

        return redirect()->route('admin.clients.index')->with('success', 'Congrats! You successfully added new client.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        DB::transaction(function () use ($request, $client){

            
            $validated = $request->validated();

            if($request->hasFile('client_img')) {
                $imgSliderPath = $request->file('client_img')->store('client_imgs', 'public'); 
                $validated['client_img'] = $imgSliderPath; 
            } else {
                $imgSliderPath = 'images/client_img-default.png'; 
            }

        

            $client->update($validated); 
        });

        return redirect()->route('admin.clients.index')->with('success', 'Congrats! You successfully edit client.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        DB::beginTransaction();

        try {
            $client->delete(); 
            DB::commit(); 

            return redirect()->route('admin.clients.index')->with('success', 'Congrats! You successfully delete client.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.clients.index')->with('error', 'something error'); 
        }
    }
}
