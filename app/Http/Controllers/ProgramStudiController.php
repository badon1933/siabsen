<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProgramStudi;

class ProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.program_studi', [
            'user' => Auth::user(),
            'program_studi' => ProgramStudi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode_prodi' => 'required',
            'jenjang' => 'required'
        ]);

        ProgramStudi::create([
            'nama' => $request->nama,
            'kode_prodi' => $request->kode_prodi,
            'jenjang' => $request->jenjang,
        ]);

        return redirect()->route('program_studi.index');
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
            'kode_prodi' => 'required',
            'jenjang' => 'required'
        ]);

        ProgramStudi::where(['id' => $id])
            ->update([
                'nama' => $request->nama,
                'kode_prodi' => $request->kode_prodi,
                'jenjang' => $request->jenjang,
            ]);

        return redirect()->route('program_studi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProgramStudi::destroy($id);
        return redirect()->route('program_studi.index');
    }
}
