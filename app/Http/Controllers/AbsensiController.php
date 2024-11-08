<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $request->validate([
            'image' => 'required_without:location',
            'location' => 'required_without:image',
        ]);

        $data = [
            'user_id' => Auth::user()->id,
            'status' => '1'
        ];

        if ($request->input('image')) {
            $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->input('image')));
            $image_name = uniqid() . '.jpeg';
            $upload = Storage::disk('local')->put("public/absensi/masuk/$image_name", $image);
            if ($upload) {
                $data += [
                    'image' => 'storage/absensi/masuk' . $image_name,
                ];
            } else {
                return redirect()->route('kelas_mendatang')->with('failed', 'Gagal absen, gunakan metode absen yang lain.');
            }
        }

        if ($request->input('location')) {
            $data += [
                'location' => $request->input('location')
            ];
        }

        Absensi::create($data);
        return redirect()->route('kelas_mendatang')->with('success', 'Absen berhasil dicatat!');
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
