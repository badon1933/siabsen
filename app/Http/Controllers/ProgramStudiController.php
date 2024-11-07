<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'jenjang' => Jenjang::all(),
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
            'jenjang_id' => 'required'
        ]);

        ProgramStudi::create([
            'nama' => $request->nama,
            'kode_prodi' => $request->kode_prodi,
            'jenjang_id' => $request->jenjang_id,
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
            'jenjang_id' => 'required'
        ]);

        ProgramStudi::where(['id' => $id])
            ->update([
                'nama' => $request->nama,
                'kode_prodi' => $request->kode_prodi,
                'jenjang_id' => $request->jenjang_id,
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
