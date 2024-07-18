<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderByDesc('id')->get();
        return view('admin.products.index', compact('products'));
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
    public function store(StoreProductRequest $request)
    {
        DB::transaction(function () use ($request){

            
            $validated = $request->validated();

            if($request->hasFile('thumbnail_1')) {
                $imgThumbnailPath1 = $request->file('thumbnail_1')->store('thumbnail_product', 'public'); 
                $validated['thumbnail_1'] = $imgThumbnailPath1; 
            } else {
                $imgThumbnailPath1 = 'images/thumbnail_1-default.png'; 
            }

            if($request->hasFile('thumbnail_2')) {
                $imgThumbnailPath2 = $request->file('thumbnail_2')->store('thumbnail_product', 'public'); 
                $validated['thumbnail_2'] = $imgThumbnailPath2; 
            } else {
                $imgThumbnailPath2 = 'images/thumbnail_2-default.png'; 
            }

            $validated['slug'] = Str::slug($validated['name']);

        

            Product::create($validated); 
        });

        return redirect()->route('admin.products.index')->with('success', 'Congrats! You successfully added new product.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        DB::transaction(function () use ($request, $product){

            
            $validated = $request->validated();

            if($request->hasFile('thumbnail_1')) {
                $imgThumbnailPath1 = $request->file('thumbnail_1')->store('thumbnail_product', 'public'); 
                $validated['thumbnail_1'] = $imgThumbnailPath1; 
            } else {
                $imgThumbnailPath1 = 'images/thumbnail_1-default.png'; 
            }

            if($request->hasFile('thumbnail_2')) {
                $imgThumbnailPath2 = $request->file('thumbnail_2')->store('thumbnail_product', 'public'); 
                $validated['thumbnail_2'] = $imgThumbnailPath2; 
            } else {
                $imgThumbnailPath2 = 'images/thumbnail_2-default.png'; 
            }

            $validated['slug'] = Str::slug($validated['name']);

            $product->update($validated); 
        });

        return redirect()->route('admin.products.index')->with('success', 'Congrats! You successfully edit product.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        DB::beginTransaction();

        try {
            $product->delete(); 
            DB::commit(); 

            return redirect()->route('admin.products.index')->with('success', 'Congrats! You successfully delete data.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.products.index')->with('error', 'something error'); 
        }
    }
}
