<?php

namespace App\Http\Controllers;
use App\Models\Type;

use Illuminate\Http\Request;

class TypeCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('crud.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        // Create the type
        $type = Type::create($validatedData);

        // Redirect to the categories list
        return redirect()->route('types.index');
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
        $type = Type::findOrFail($id);
        return view('crud.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type = Type::findOrFail($id);

        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        // Update the type
        $type->update($validatedData);

        // Redirect to the categories page
        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Type::destroy($id);
        return redirect()->route('types.index');
    }
}
