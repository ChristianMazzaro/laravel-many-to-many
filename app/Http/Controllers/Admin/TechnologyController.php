<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Requests\Auth\Technology\StoreTechnologyRequest;
use App\Http\Requests\Auth\Technology\UpdateTechnologyRequest;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index',compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {

        $formData = $request->validated();
      
        $technology = new Technology();
        $technology->title = $formData['title'];
        $technology->slug = str()->slug($formData['title']);

        $technology->save();
    
        return redirect()->route('admin.technologies.store', [$technology->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show',compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        $type = Technology::findOrFail($technology->id);
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {

        $formData = $request->validated();

        $technology = Technology::findOrFail($technology->id);
        $technology->title = $formData['title'];
        $technology->slug = str()->slug($formData['title']);

        $technology->save();
    
        return redirect()->route('admin.technologies.show', [$technology->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology = Technology::findOrFail($technology->id);
        $technology->delete();
    
        return redirect()->route('admin.technologies.index');
    }
}
