<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\MasterKelas;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master_kelas', [
            'user' => Auth::user(),
            'master_kelas' => MasterKelas::all(),
            'periode' => Periode::all(),
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
            'program_studi_id' => 'required',
            'periode_id' => 'required'
        ]);

        MasterKelas::create([
            'nama' => $request->nama,
            'program_studi_id' => $request->program_studi_id,
            'periode_id' => $request->periode_id,
        ]);

        return redirect()->route('master_kelas.index');
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
            'program_studi_id' => 'required',
            'periode_id' => 'required'
        ]);

        MasterKelas::where(['id' => $id])
            ->update([
                'nama' => $request->nama,
                'program_studi_id' => $request->program_studi_id,
                'periode_id' => $request->periode_id,
            ]);

        return redirect()->route('master_kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MasterKelas::destroy($id);
        return redirect()->route('master_kelas.index');
    }
}
