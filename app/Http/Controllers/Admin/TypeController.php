<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Requests\Type\StoreTypeRequest;
use App\Http\Requests\Type\UpdateTypeRequest;

use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);
    
        
        
        $type = new Type();
        $type->title = $validatedData['title'];
        $type->slug = $validatedData['slug'];

        $type->save();
    
        return redirect()->route('admin.types', ['id' => $type->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('admin.types.show',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $type = Type::findOrFail($type->id);
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);
    
        $type = Type::findOrFail($type->id);
        $type->title = $validatedData['title'];
        $type->slug = $validatedData['slug'];
        $type->save();
    
        return redirect()->route('admin.types', ['id' => $type->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type = Type::findOrFail($type->id);
        $type->delete();
    
        return redirect()->route('admin.types');
    }
}
