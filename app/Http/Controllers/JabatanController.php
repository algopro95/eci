<?php
namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::all();
        return Inertia::render('Jabatan/Index', ['jabatans' => $jabatans]);
    }

    public function create()
    {
        return Inertia::render('Jabatan/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'id_level' => 'required|integer|max:100',
        ]);

        Jabatan::create($request->all());
        return redirect()->route('jabatans.index')->with('success', 'Jabatan created successfully.');
    }

    public function edit(Jabatan $jabatan)
    {
        return Inertia::render('Jabatan/Edit', ['jabatan' => $jabatan]);
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'id_level' => 'required|integer|max:100',
        ]);

        $jabatan->update($request->all());
        return redirect()->route('jabatans.index')->with('success', 'Jabatan updated successfully.');
    }

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect()->route('jabatans.index')->with('success', 'Jabatan deleted successfully.');
    }
}
