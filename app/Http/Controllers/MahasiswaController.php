<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // konsep read all
        $mahasiswas = Mahasiswa::all();

        return view('mahasiswa.index',[
            'mahasiswas' => $mahasiswas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'name' => 'required',
            'jurusan' => 'required|min:8',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nim' => "required|unique:mahasiswas,nim,$mahasiswa->id",
            'name' => 'required',
            'jurusan' => 'required|min:8',
        ]);

        // Mahasiswa::where('id', $mahasiswa->id)->update($validated);

        $mahasiswa->nim = $validated['nim'];
        $mahasiswa->name = $validated['name'];
        $mahasiswa->jurusan = $validated['jurusan'];
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
