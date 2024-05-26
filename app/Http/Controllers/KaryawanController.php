<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use Inertia\Inertia;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return Inertia::render('Karyawans/Index', ['karyawans' => $karyawans]);
    }

    public function create()
    {
        return Inertia::render('Karyawans/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:10|unique:karyawans',
            'nama' => 'required|string|max:100',
            'ttl' => 'required|date',
            'alamat' => 'required|string',
            'id_jabatan' => 'required|exists:jabatans,id',
            'id_dept' => 'required|exists:departments,id',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('karyawans.index')
            ->with('success', 'Karyawan created successfully.');
    }

    public function edit(Karyawan $karyawan)
    {
        return Inertia::render('Karyawans/Edit', ['karyawan' => $karyawan]);
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nik' => 'required|string|max:10|unique:karyawans,nik,' . $karyawan->id,
            'nama' => 'required|string|max:100',
            'ttl' => 'required|date',
            'alamat' => 'required|string',
            'id_jabatan' => 'required|exists:jabatans,id',
            'id_dept' => 'required|exists:departments,id',
        ]);

        $karyawan->update($request->all());

        return redirect()->route('karyawans.index')
            ->with('success', 'Karyawan updated successfully');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawans.index')
            ->with('success', 'Karyawan deleted successfully');
    }
}
