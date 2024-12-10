<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.mahasiswa', [
            'user' => Auth::user(),
            'mahasiswa' => Mahasiswa::paginate(10),
            'program_studi' => ProgramStudi::all()
        ]);
    }

    /**
     * Import a newly created resource.
     */
    public function import()
    {
        Excel::import(new MahasiswaImport, request()->file('import_mahasiswa'));

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diimport!');
    }

    /**
     * Export a newly created resource.
     */
    public function export()
    {
        Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil didownload!');
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
            'nama_lengkap' => 'required',
            'npm' => 'required',
            'email' => 'required',
            'program_studi_id' => 'required'
        ]);

        Mahasiswa::create([
            'nama_lengkap' => $request->nama_lengkap,
            'npm' => $request->npm,
            'email' => $request->email,
            'program_studi_id' => $request->program_studi_id,
        ]);

        return redirect()->route('mahasiswa.index');
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
            'nama_lengkap' => 'required',
            'npm' => 'required',
            'email' => 'required',
            'program_studi_id' => 'required'
        ]);

        Mahasiswa::where(['id' => $id])
            ->update([
                'nama_lengkap' => $request->nama_lengkap,
                'npm' => $request->npm,
                'email' => $request->email,
                'program_studi_id' => $request->program_studi_id,
            ]);

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mahasiswa::destroy($id);
        return redirect()->route('mahasiswa.index');
    }
}
