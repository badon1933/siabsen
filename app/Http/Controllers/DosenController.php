<?php

namespace App\Http\Controllers;

use App\Imports\DosenImport;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.dosen', [
            'user' => Auth::user(),
            'dosen' => Dosen::orderByDesc('updated_at')->paginate(10),
        ]);
    }

    /**
     * Import a newly created resource.
     */
    public function import()
    {
        Excel::import(new DosenImport, request()->file('import_dosen'));

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil diimport!');
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
            'nidn' => 'required|unique:dosens',
            'email' => 'required',
        ]);

        Dosen::create([
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'email' => $request->email,
        ]);

        return redirect()->route('dosen.index');
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
            'nidn' => 'required|unique:dosens',
            'email' => 'required',
        ]);

        Dosen::where(['id' => $id])
            ->update([
                'nama' => $request->nama,
                'nidn' => $request->nidn,
                'email' => $request->email,
            ]);

        return redirect()->route('dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Dosen::destroy($id);
        return redirect()->route('dosen.index');
    }
}
