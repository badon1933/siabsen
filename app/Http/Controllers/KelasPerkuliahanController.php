<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Models\KelasPerkuliahan;
use App\Models\MasterKelas;
use Illuminate\Support\Facades\Auth;

class KelasPerkuliahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kelas_perkuliahan', [
            'user' => Auth::user(),
            'kelas_perkuliahan' => KelasPerkuliahan::all(),
            'master_kelas' => MasterKelas::all(),
            'mata_kuliah' => MataKuliah::all(),
            'dosen' => Dosen::all(),
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
            'master_kelas_id' => 'required',
            'mata_kuliah_id' => 'required',
        ]);

        KelasPerkuliahan::create([
            'master_kelas_id' => $request->master_kelas_id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
        ]);

        return redirect()->route('kelas_perkuliahan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dashboard.lihat_kelas_perkuliahan', [
            'user' => Auth::user(),
            'kelas_perkuliahan' => KelasPerkuliahan::all(),
        ]);
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
            'master_kelas_id' => 'required',
            'mata_kuliah_id' => 'required',
        ]);

        KelasPerkuliahan::where(['id' => $id])
            ->update([
                'master_kelas_id' => $request->master_kelas_id,
                'mata_kuliah_id' => $request->mata_kuliah_id,
            ]);

        return redirect()->route('kelas_perkuliahan.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KelasPerkuliahan::destroy($id);
        return redirect()->route('kelas_perkuliahan.destroy');
    }
}
