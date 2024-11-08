<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        if ($request->input('image')) {
            $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->input('image')));
            $image_name = uniqid() . '.jpeg';
            $upload = Storage::disk('local')->put("public/absensi/masuk/$image_name", $image);
            if ($upload) {
                return redirect()->route('kelas_mendatang')->with('success', 'Absen berhasil dicatat!');
            } else {
                return redirect()->route('kelas_mendatang')->with('failed', 'Gagal absen, gunakan cara absen yang lain.');
            }
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
