<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.mata_kuliah', [
            'user' => Auth::user(),
            'mata_kuliah' => MataKuliah::all(),
            'program_studi' => ProgramStudi::all(),
        ]);
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
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode_matkul' => 'required',
            'program_studi_id' => 'required'
        ]);

        MataKuliah::create([
            'nama' => $request->nama,
            'kode_matkul' => $request->kode_matkul,
            'program_studi_id' => $request->program_studi_id,
        ]);

        return redirect()->route('mata_kuliah.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'kode_matkul' => 'required',
            'program_studi_id' => 'required'
        ]);

        MataKuliah::where(['id' => $id])
            ->update([
                'nama' => $request->nama,
                'kode_matkul' => $request->kode_matkul,
                'program_studi_id' => $request->program_studi_id,
            ]);

        return redirect()->route('mata_kuliah.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MataKuliah::destroy($id);
        return redirect()->route('mata_kuliah.index');
    }
}
