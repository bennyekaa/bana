<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\Pengguna;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    //
    public function index()
    {
        session()->put('pengguna', url()->full());
        $data['menu'] = 'Pengguna';
        $data['breadcrumb'] = 'Pengguna';
        $data['pengguna'] = Pengguna::with('role')->get();
        return view('page.master.pengguna.index', $data);
    }

    public function tambah()
    {
        $data['pangkat'] = Pangkat::all();
        $data['jabatan'] = Jabatan::all();
        $data['role'] = Role::where('nama', '<>', 'Developer')->where('status', '<>', 0)->get();
        return view('page.master.pengguna.add', $data);
    }

    public function edit($id)
    {
        $id = decrypt($id);

        $data['pengguna'] = Pengguna::with('biodata')->find($id);
        $data['pangkat'] = Pangkat::all();
        $data['jabatan'] = Jabatan::all();
        $data['role'] = Role::where('nama', '<>', 'Developer')
            ->where('status', '<>', 0)
            ->get();

        return view('page.master.pengguna.edit', $data);
    }

    public function hapus($id)
    {
        try {
            $pengguna = Pengguna::find(decrypt($id));
            $biodata = Biodata::find($pengguna->id_biodata);
            $pengguna->delete();
            if ($biodata) {
                $biodata->delete();
            }
            return redirect(session('pengguna'))->with('success', 'Data Terhapus');
        } catch (Exception $e) {
            return redirect(session('pengguna'))->with('error', $e->getMessage());
        }
    }

    public function status($id)
    {
        $pengguna = Pengguna::find(decrypt($id));

        $pengguna->status = $pengguna->status == 1 ? 0 : 1;
        $pengguna->save();

        return redirect(session('pengguna'))->with('success', 'Status berhasil diubah');
    }

    public function action(Request $request)
    {
        // dd($request->all());
        if ($request->fungsi == 'tambah') {
            DB::transaction(function () use ($request) {

                $biodata = Biodata::create([
                    'nrp' => $request->nrp,
                    'gelar_depan' => $request->gelar_depan,
                    'gelar_belakang' => $request->gelar_belakang,
                    'nama' => $request->nama,
                    'id_pangkat' => $request->id_pangkat,
                    'id_jabatan' => $request->id_jabatan,
                    'hp' => $request->hp,
                    'alamat' => $request->alamat,
                    'pin' => hash('sha256', $request->pin),
                ]);

                Pengguna::create([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'id_role' => $request->id_role,
                    'id_biodata' => $biodata->id
                ]);
            });

            return redirect(session('pengguna'))->with('success', 'Data Berhasil Ditambah');
        } else if ($request->fungsi == 'edit') {

            DB::transaction(function () use ($request) {

                $pengguna = Pengguna::find(decrypt($request->id));
                $biodata = Biodata::find($pengguna->id_biodata);

                // update biodata
                $biodata->update([
                    'nrp' => $request->nrp,
                    'gelar_depan' => $request->gelar_depan,
                    'gelar_belakang' => $request->gelar_belakang,
                    'nama' => $request->nama,
                    'id_pangkat' => $request->id_pangkat,
                    'id_jabatan' => $request->id_jabatan,
                    'hp' => $request->hp,
                    'alamat' => $request->alamat,
                ]);

                // update pengguna
                $pengguna->update([
                    'username' => $request->username,
                    'id_role' => $request->id_role,
                ]);

                // update password kalau diisi
                if ($request->password) {
                    $pengguna->update([
                        'password' => Hash::make($request->password)
                    ]);
                }
            });

            return redirect(session('pengguna'))->with('success', 'Data Berhasil Diupdate');
        }
    }

    public function detail($id)
    {
        $pengguna = Pengguna::with('biodata.pangkat', 'biodata.jabatan')
            ->find(decrypt($id));

        return view('page.master.pengguna.detail', compact('pengguna'));
    }
}
