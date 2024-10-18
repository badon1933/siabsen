<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function update_password(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:6|same:konfirmasi_password',
            'konfirmasi_password' => 'required'
        ]);

        if (Hash::check($request->password_lama, auth()->user()->password)) {
            $newPassword = Hash::make($request->input('password_baru'));
            User::where('id', auth()->user()->id)
                ->update(['password' => $newPassword]);
            return back()->with('success', 'Password berhasil diupdate');
        } else {
            return back()->with('failed', 'Password salah');
        }
    }
}
