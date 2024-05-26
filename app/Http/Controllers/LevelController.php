<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        return Inertia::render('Level/Index', ['levels' => $levels]);
    }

    public function create()
    {
        return Inertia::render('Level/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_level' => 'required|string|max:100',
        ]);

        Level::create($request->all());
        return redirect()->route('levels.index')->with('success', 'Level created successfully.');
    }

    public function edit(Level $level)
    {
        return Inertia::render('Level/Edit', ['level' => $level]);
    }

    public function update(Request $request, Level $level)
    {
        $request->validate([
            'nama_level' => 'required|string|max:100',
        ]);

        $level->update($request->all());
        return redirect()->route('levels.index')->with('success', 'Level updated successfully.');
    }

    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->route('levels.index')->with('success', 'Level deleted successfully.');
    }
}
