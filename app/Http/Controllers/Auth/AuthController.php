<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('page.auth.login');
    }

    public function actionlogin(Request $request)
    {
        // dd(Hash::make('developerselalubenar'));
        // dd($check);
        try {
            $check = Pengguna::where('username', $request->username)->where('status', 1)->count();
            if ($check > 0) {
                $user = Pengguna::where('username', $request->username)->first();
                if (!Hash::check($request->password, $user->password)) {
                    return redirect('/login')->with('error', 'Login Gagal, Cek Username dan Password Anda!!');
                } else {
                    Session::put([
                        'id_user' => $user->id,
                        'role' => $user->role,
                        'username' => $user->username,
                        'keterangan' => $user->keterangan,
                        'login' => 1
                    ]);
                    return redirect('/')->with('success', 'Selamat Datang');
                }
            } else {
                return redirect('/login')->with('error', 'Login Gagal, Cek Username dan Password Anda!!');
            }
        } catch (Exception $e) {
            // return redirect('/login')->with('error', $e->getMessage());
            return redirect('/login')->with('error', 'Silahkan Cek Kembali Data Anda');
        }
    }

    public function logout(Request $request)
    {
        // Hapus semua data session
        Session::flush();

        // Regenerasi session ID (keamanan)
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda berhasil logout');
    }
}
