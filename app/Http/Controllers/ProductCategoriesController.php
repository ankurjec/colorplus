<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::all();

        return view('product_category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // Create a new ProductCategory instance
        $productCategory = new ProductCategory();
        $productCategory->name = $validatedData['name'];
        $productCategory->description = $validatedData['description'];

        // Save the new product category to the database
        $productCategory->save();

        // Redirect the user to a success page or show a success message
        return redirect()->route('product_category.index')->with('success', 'Product category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = ProductCategory::findOrFail($id);

        return view('product_category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Retrieve the category based on the provided ID
        $category = ProductCategory::findOrFail($id);

        // Update the category with the validated data
        $category->update($validatedData);

        // Redirect to a suitable route after the update
        return redirect()->route('product_category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $del_cat = ProductCategory::findOrFail($id);
        $del_cat->delete();

        return redirect()->route('product_category.index');

    }
}
