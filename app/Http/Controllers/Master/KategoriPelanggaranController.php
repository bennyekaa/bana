<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\KategoriPelanggaran;
use Exception;
use Illuminate\Http\Request;

class KategoriPelanggaranController extends Controller
{
    //
    public function index()
    {
        session()->put('kategoripelanggaran', url()->full());
        $data['menu'] = 'Kategori Pelanggaran';
        $data['breadcrumb'] = 'Kategori Pelanggaran';
        $data['kategoripelanggaran'] = KategoriPelanggaran::orderBy('nama')->get();
        return view('page.master.kategoripelanggaran.index', $data);
    }

    public function tambah()
    {
        $data['menu'] = 'Tambah Kategori Pelanggaran';
        $data['breadcrumb'] = 'Tambah Kategori Pelanggaran';
        return view('page.master.kategoripelanggaran.add', $data);
    }

    public function edit($id)
    {
        $data['menu'] = 'Edit Kategori Pelanggaran';
        $data['breadcrumb'] = 'Edit Kategori Pelanggaran';
        $data['kategoripelanggaran'] = KategoriPelanggaran::find(decrypt($id));
        // dd($data['agama']);
        return view('page.master.kategoripelanggaran.edit', $data);
    }

    public function hapus($id)
    {
        try {
            $kategoripelanggaran = KategoriPelanggaran::find(decrypt($id));
            $kategoripelanggaran->delete();
            return redirect(session('kategoripelanggaran'))->with('success', 'Data Terhapus');
        } catch (Exception $e) {
            return redirect(session('kategoripelanggaran'))->with('error', $e->getMessage());
        }
    }

    public function status($id, $stat)
    {
        try {
            $kategoripelanggaran = KategoriPelanggaran::find(decrypt($id));
            $kategoripelanggaran->status = $stat;
            // $agama->updated_by = session()->get('username');
            $kategoripelanggaran->save();
            return redirect(session('kategoripelanggaran'))->with('success', 'Status Berubah');
        } catch (Exception $e) {
            return redirect(session('kategoripelanggaran'))->with('error', $e->getMessage());
        }
    }

    public function action(Request $request)
    {
        if ($request->fungsi == 'tambah') {
            $kategoripelanggaran = new KategoriPelanggaran();
            $kategoripelanggaran->nama = $request->nama;
            $kategoripelanggaran->keterangan = $request->keterangan;
            // $agama->created_by = session()->get('username');
            $kategoripelanggaran->save();

            return redirect(session('kategoripelanggaran'))->with('success', 'Data Berhasil Ditambah');
        } else if ($request->fungsi == 'edit') {
            $kategoripelanggaran = KategoriPelanggaran::find(decrypt($request->id));
            $kategoripelanggaran->nama = $request->nama;
            $kategoripelanggaran->keterangan = $request->keterangan;
            // $agama->created_by = session()->get('username');
            $kategoripelanggaran->save();
            return redirect(session('kategoripelanggaran'))->with('success', 'Data Berhasil Diubah');
        }
    }
}
