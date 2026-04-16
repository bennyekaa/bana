<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\KategoriPelanggaran;
use App\Models\Pelanggaran;
use Exception;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    //
    public function index()
    {
        session()->put('pelanggaran', url()->full());
        $data['menu'] = 'Pelanggaran';
        $data['breadcrumb'] = 'Pelanggaran';
        $data['pelanggaran'] = Pelanggaran::all();
        return view('page.master.pelanggaran.index', $data);
    }

    public function tambah()
    {
        $data['menu'] = 'Tambah Pelanggaran';
        $data['breadcrumb'] = 'Tambah Pelanggaran';
        $data['kategori'] = KategoriPelanggaran::all();
        return view('page.master.pelanggaran.add', $data);
    }

    public function edit($id)
    {
        $data['menu'] = 'Edit Pelanggaran';
        $data['breadcrumb'] = 'Edit Pelanggaran';
        $data['pelanggaran'] = Pelanggaran::find(decrypt($id));
        $data['kategori'] = KategoriPelanggaran::all();
        return view('page.master.pelanggaran.edit', $data);
    }

    public function hapus($id)
    {
        try {
            $pelanggaran = Pelanggaran::find(decrypt($id));
            $pelanggaran->delete();
            return redirect(session('pelanggaran'))->with('success', 'Data Terhapus');
        } catch (Exception $e) {
            return redirect(session('pelanggaran'))->with('error', $e->getMessage());
        }
    }

    public function status($id, $stat)
    {
        try {
            $pelanggaran = Pelanggaran::find(decrypt($id));
            $pelanggaran->status = $stat;
            // $pelanggaran->updated_by = session()->get('username');
            $pelanggaran->save();
            return redirect(session('pelanggaran'))->with('success', 'Status Berubah');
        } catch (Exception $e) {
            return redirect(session('pelanggaran'))->with('error', $e->getMessage());
        }
    }

    public function action(Request $request)
    {
        if ($request->fungsi == 'tambah') {
            $pelanggaran = new Pelanggaran();
            $pelanggaran->kode = $request->kode;
            $pelanggaran->id_kategori_pelanggaran = $request->kategori_id;
            $pelanggaran->nama = $request->nama;
            $pelanggaran->keterangan = $request->keterangan;
            // $pelanggaran->created_by = session()->get('username');
            $pelanggaran->save();

            return redirect(session('pelanggaran'))->with('success', 'Data Berhasil Ditambah');
        } else if ($request->fungsi == 'edit') {
            $pelanggaran = Pelanggaran::find(decrypt($request->id));
            $pelanggaran->kode = $request->kode;
            $pelanggaran->id_kategori_pelanggaran = $request->kategori_id;
            $pelanggaran->nama = $request->nama;
            $pelanggaran->keterangan = $request->keterangan;
            // $pelanggaran->created_by = session()->get('username');
            $pelanggaran->save();
            return redirect(session('pelanggaran'))->with('success', 'Data Berhasil Diubah');
        }
    }
}
